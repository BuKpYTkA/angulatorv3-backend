<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 22.01.2020
 * Time: 12:16
 */

namespace App\Services\GameService\DTO;

use App\Answer;
use App\Game;

/**
 * Class GameDTO
 * @package App\Services\GameService\DTO
 */
class GameDTO implements GameDTOInterface
{

    /**
     * @var Game
     */
    private $game;

    /**
     * @var Answer
     */
    private $answer;

    /**
     * GameDTO constructor.
     * @param Game $game
     * @param Answer $answer
     */
    public function __construct(Game $game, Answer $answer)
    {
        $this->game = $game;
        $this->answer = $answer;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->game->getId();
    }

    /**
     * @return null|string
     */
    public function getTitle()
    {
        return $this->answer->getTitle();
    }

    /**
     * @return null|string
     */
    public function getSource()
    {
        return $this->answer->getSource();
    }

}