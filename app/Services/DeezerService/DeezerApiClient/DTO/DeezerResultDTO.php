<?php
/**
 * Created by PhpStorm.
 * User: t.matskovich
 * Date: 21.01.2020
 * Time: 17:23
 */

namespace App\Services\DeezerService\DeezerApiClient\DTO;


/**
 * Class DeezerResultDTO
 * @package App\Services\DeezerService\DeezerApiClient\DTO
 */
class DeezerResultDTO implements DeezerResultDTOInterface
{

    /**
     * @var array
     */
    private $data;

    /**
     * DeezerResultDTO constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->data['id'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getTitle()
    {
        return $this->data['title'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getPreview()
    {
        return $this->data['preview'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getArtist()
    {
        return $this->data['artist']['name'] ?? null;
    }
}
