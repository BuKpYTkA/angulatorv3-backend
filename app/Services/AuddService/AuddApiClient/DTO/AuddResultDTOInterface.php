<?php
/**
 * Created by PhpStorm.
 * User: t.matskovich
 * Date: 21.01.2020
 * Time: 16:20
 */

namespace App\Services\AuddService\AuddApiClient\DTO;

/**
 * Interface AuddDTOInterface
 * @package App\Services\AuddService\AuddApiClient\DTO
 */
interface AuddResultDTOInterface
{

    /**
     * @return int|null
     */
    public function getDeezerId();

    /**
     * @return string|null
     */
    public function getArtist();

    /**
     * @return string|null
     */
    public function getTitle();


}
