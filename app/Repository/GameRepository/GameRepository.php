<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 21.01.2020
 * Time: 11:46
 */

namespace App\Repository\GameRepository;

use App\Answer;
use App\Game;
use App\GameSource;
use App\User;

/**
 * Class GameRepository
 * @package App\Repository\GameRepository
 */
class GameRepository
{

    /**
     * @param User $user
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Game[]
     */
    public function findFinishedForUser(User $user)
    {
        return Game::query()
            ->where(['user_id' => $user->getId()])
            ->whereNotNull('is_win')
            ->with(['answer', 'source'])->get();
    }

    /**
     * @param User $user
     * @param GameSource $gameSource
     * @param Answer $answer
     * @param bool|null $isWin
     * @return \Illuminate\Database\Eloquent\Builder|Game
     */
    public function create(User $user, GameSource $gameSource, Answer $answer, bool $isWin = null)
    {
        return Game::query()->create([
            'game_type' => $gameSource->getSourceType(),
            'is_win' => $isWin,
            'answer_id' => $answer->getId(),
            'user_id' => $user->getId(),
            'game_source_id' => $gameSource->getId(),
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|Game|null
     */
    public function find(int $id)
    {
        return Game::query()->find($id);
    }

}