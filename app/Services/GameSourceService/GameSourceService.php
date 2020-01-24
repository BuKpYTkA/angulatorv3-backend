<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 23.01.2020
 * Time: 18:28
 */

namespace App\Services\GameSourceService;

use App\Enum\GameTypeEnum;
use App\Repository\GameSourceRepository\GameSourceRepository;
use App\Services\AudioUploadService\AudioUploadServiceInterface;

/**
 * Class GameSourceService
 * @package App\Services\GameSourceService
 */
class GameSourceService implements GameSourceServiceInterface
{

    /**
     * @var GameSourceRepository
     */
    private $gameSourceRepository;

    /**
     * @var AudioUploadServiceInterface
     */
    private $audioUploadService;

    /**
     * GameSourceService constructor.
     * @param GameSourceRepository $gameSourceRepository
     * @param AudioUploadServiceInterface $audioUploadService
     */
    public function __construct(GameSourceRepository $gameSourceRepository, AudioUploadServiceInterface $audioUploadService)
    {
        $this->gameSourceRepository = $gameSourceRepository;
        $this->audioUploadService = $audioUploadService;
    }

    /**
     * @param string $source
     * @param string $gameType
     * @return \App\GameSource|\Illuminate\Database\Eloquent\Builder
     */
    public function create(string $source, string $gameType)
    {
        switch ($gameType) {
            case GameTypeEnum::LYRICS:
                return $this->gameSourceRepository->create($source, $gameType);
            default:
                $audioFilePath = $this->audioUploadService->uploadFromBase64($source);
                return $this->gameSourceRepository->create($audioFilePath, $gameType);
        }
    }

}