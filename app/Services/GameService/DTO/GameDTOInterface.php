<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 22.01.2020
 * Time: 12:17
 */

namespace App\Services\GameService\DTO;


/**
 * Class GameDTO
 * @package App\Services\GameService\DTO
 */
interface GameDTOInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @return null|string
     */
    public function getTitle();

    /**
     * @return null|string
     */
    public function getSource();
}