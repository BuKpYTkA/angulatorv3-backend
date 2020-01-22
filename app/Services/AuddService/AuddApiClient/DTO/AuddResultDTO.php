<?php
/**
 * Created by PhpStorm.
 * User: t.matskovich
 * Date: 21.01.2020
 * Time: 16:20
 */

namespace App\Services\AuddService\AuddApiClient\DTO;


/**
 * Class AuddDTO
 * @package App\Services\AuddService\AuddApiClient\DTO
 */
class AuddResultDTO implements AuddResultDTOInterface
{

    /**
     * @var array
     */
    private $data;

    /**
     * AuddResultDTO constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return int|null
     */
    public function getDeezerId()
    {
        if (isset($this->data['deezer']) && isset($this->data['deezer']['id'])) {
            return $this->data['deezer']['id'];
        }
        return null;
    }

    /**
     * @return string|null
     */
    public function getArtist()
    {
        return $this->data['artist'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getTitle()
    {
        return $this->data['title'] ?? null;
    }
}
