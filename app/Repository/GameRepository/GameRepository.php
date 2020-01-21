<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 21.01.2020
 * Time: 11:46
 */

namespace App\Repository\GameRepository;

use App\Game;
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
    public function findForUser(User $user)
    {
        return Game::query()->where(['user_id' => $user->getId()])->with(['answer', 'source'])->get();
    }

}