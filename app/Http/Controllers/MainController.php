<?php

namespace App\Http\Controllers;

use App\Http\Requests\FinishGameRequest;
use App\Http\Requests\GameStartRequest;
use App\Http\Requests\UserStatsRequest;
use App\Http\Resources\GameStatisticResource;
use App\Http\Resources\StartGameResource;
use App\Repository\GameRepository\GameRepository;
use App\Repository\UserRepository\UserRepository;
use App\Services\GameService\GameServiceInterface;
use Illuminate\Http\Request;

/**
 * Class MainController
 * @package App\Http\Controllers
 */
class MainController extends Controller
{

    /**
     * @var GameRepository
     */
    private $gameRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var GameServiceInterface
     */
    private $gameService;

    /**
     * MainController constructor.
     * @param GameRepository $gameRepository
     * @param UserRepository $userRepository
     * @param GameServiceInterface $gameService
     */
    public function __construct(
        GameRepository $gameRepository,
        UserRepository $userRepository,
        GameServiceInterface $gameService
    )
    {
        $this->gameRepository = $gameRepository;
        $this->userRepository = $userRepository;
        $this->gameService = $gameService;
    }

    /**
     * @param UserStatsRequest $request
     * @return array|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getUserStats(UserStatsRequest $request)
    {
        $request->validated();
        $email = $request->getEmail();
        $user = $this->userRepository->findByEmail($email);
        if ($user) {
            $games = $this->gameRepository->findFinishedForUser($user);
            return GameStatisticResource::collection($games);
        }
        return $this->emptyResponse();
    }

    /**
     * @param GameStartRequest $request
     * @return StartGameResource
     * @throws \Exception
     */
    public function startGame(GameStartRequest $request)
    {
        $email = $request->getEmail();
        $source = $request->getSource();
        $gameType = $request->getGameType();
        $game = $this->gameService->startAndGetGame($email, $gameType, $source);
        return new StartGameResource($game);
    }

    /**
     * @param FinishGameRequest $request
     * @return array
     */
    public function finishGame(FinishGameRequest $request)
    {
        $id = $request->getGameId();
        $isWin = $request->isWin();
        $game = $this->gameRepository->find($id);
        $game->setIsWin($isWin);
        $game->save();
        return $this->emptyResponse();
    }

}
