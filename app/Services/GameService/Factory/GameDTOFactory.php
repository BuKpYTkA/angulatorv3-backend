<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 22.01.2020
 * Time: 12:17
 */

namespace App\Services\GameService\Factory;

use App\Answer;
use App\Game;
use App\Services\GameService\DTO\GameDTO;
use App\Services\GameService\DTO\GameDTOInterface;

/**
 * Class GameDTOFactory
 * @package App\Services\GameService\Factory
 */
class GameDTOFactory implements GameDTOFactoryInterface
{

    /**
     * @param Game $game
     * @param Answer $answer
     * @return GameDTOInterface
     */
    public function create(Game $game, Answer $answer)
    {
        return new GameDTO($game, $answer);
    }

}