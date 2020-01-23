<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 22.01.2020
 * Time: 11:54
 */

namespace App\Services\GameService;

use App\Enum\GameTypeEnum;
use App\GameSource;
use App\Repository\AnswerRepository\AnswerRepository;
use App\Repository\GameRepository\GameRepository;
use App\Repository\GameSourceRepository\GameSourceRepository;
use App\Repository\UserRepository\UserRepository;
use App\Services\AudioService\AudioServiceInterface;
use App\Services\GameService\Factory\GameDTOFactoryInterface;

/**
 * Class GameService
 * @package App\Services\GameService
 */
class GameService implements GameServiceInterface
{

    /**
     * @var AudioServiceInterface
     */
    private $audioService;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var GameSourceRepository
     */
    private $gameSourceRepository;
    /**
     * @var AnswerRepository
     */
    private $answerRepository;
    /**
     * @var GameRepository
     */
    private $gameRepository;
    /**
     * @var GameDTOFactoryInterface
     */
    private $gameDTOFactory;

    /**
     * GameService constructor.
     * @param AudioServiceInterface $audioService
     * @param UserRepository $userRepository
     * @param GameSourceRepository $gameSourceRepository
     * @param AnswerRepository $answerRepository
     * @param GameRepository $gameRepository
     * @param GameDTOFactoryInterface $gameDTOFactory
     */
    public function __construct(
        AudioServiceInterface $audioService,
        UserRepository $userRepository,
        GameSourceRepository $gameSourceRepository,
        AnswerRepository $answerRepository,
        GameRepository $gameRepository,
        GameDTOFactoryInterface $gameDTOFactory
    )
    {
        $this->audioService = $audioService;
        $this->userRepository = $userRepository;
        $this->gameSourceRepository = $gameSourceRepository;
        $this->answerRepository = $answerRepository;
        $this->gameRepository = $gameRepository;
        $this->gameDTOFactory = $gameDTOFactory;
    }

    /**
     * @param string $email
     * @param string $gameType
     * @param string $source
     * @return DTO\GameDTOInterface
     * @throws \Exception
     */
    public function startAndGetGame(string $email, string $gameType, string $source)
    {
        $user = $this->userRepository->findByEmail($email);
        if (!$user) {
            $user = $this->userRepository->create($email);
        }
        $gameSource = $this->gameSourceRepository->create($source, $gameType);
        $result = $this->recognizeByGameSource($gameSource);
        $answer = $this->answerRepository->create($result);
        $game = $this->gameRepository->create($user, $gameSource, $answer);
        return $this->gameDTOFactory->create($game, $answer);
    }

    /**
     * @param GameSource $gameSource
     * @return \App\Services\DeezerService\DeezerApiClient\DTO\DeezerResultDTOInterface|null
     */
    private function recognizeByGameSource(GameSource $gameSource)
    {
        switch ($gameSource->getSourceType()) {
            case GameTypeEnum::LYRICS:
                return $this->audioService->recognizeByText($gameSource->getSource());
            case GameTypeEnum::HUMMING:
                return $this->audioService->recognizeByHumming($gameSource->getSource());
            case GameTypeEnum::SOUND:
                return $this->audioService->recognizeByMusic($gameSource->getSource());
            default:
                return null;
        }
    }
}