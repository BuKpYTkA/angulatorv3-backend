<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 21.01.2020
 * Time: 11:41
 */

namespace App\Repository\UserRepository;

use App\User;

/**
 * Class UserRepository
 * @package App\Repository\UserRepository
 */
class UserRepository
{

    /**
     * @param int $id
     * @return User|null
     */
    public function find(int $id)
    {
        return User::query()->find($id)->first();
    }

    /**
     * @param string $email
     * @return \Illuminate\Database\Eloquent\Builder|User|null
     */
    public function findByEmail(string $email)
    {
        return User::query()->where(['email' => $email])->first();
    }

}