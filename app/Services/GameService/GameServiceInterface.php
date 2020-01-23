<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 22.01.2020
 * Time: 12:19
 */

namespace App\Services\GameService;


/**
 * Class GameService
 * @package App\Services\GameService
 */
interface GameServiceInterface
{
    /**
     * @param string $email
     * @param string $gameType
     * @param string $source
     * @return DTO\GameDTOInterface
     * @throws \Exception
     */
    public function startAndGetGame(string $email, string $gameType, string $source);
}