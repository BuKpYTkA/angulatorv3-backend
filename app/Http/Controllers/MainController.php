<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStatsRequest;
use App\Http\Resources\GameResource;
use App\Repository\GameRepository\GameRepository;
use App\Repository\UserRepository\UserRepository;

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
     * MainController constructor.
     * @param GameRepository $gameRepository
     * @param UserRepository $userRepository
     */
    public function __construct(
        GameRepository $gameRepository,
        UserRepository $userRepository
    )
    {
        $this->gameRepository = $gameRepository;
        $this->userRepository = $userRepository;
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
            $games = $this->gameRepository->findForUser($user);
            return GameResource::collection($games);
        }
        return $this->emptyResponse();
    }

}
