<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 22.01.2020
 * Time: 12:18
 */

namespace App\Services\GameService\Factory;


use App\Answer;
use App\Game;
use App\Services\GameService\DTO\GameDTOInterface;

/**
 * Class GameDTOFactory
 * @package App\Services\GameService\Factory
 */
interface GameDTOFactoryInterface
{
    /**
     * @param Game $game
     * @param Answer $answer
     * @return GameDTOInterface
     */
    public function create(Game $game, Answer $answer);
}