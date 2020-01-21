<?php
/**
 * Created by PhpStorm.
 * User: t.matskovich
 * Date: 21.01.2020
 * Time: 17:23
 */

namespace App\Services\DeezerService\DeezerApiClient\DTO;


/**
 * Interface DeezerResultDTOInterface
 * @package App\Services\DeezerService\DeezerApiClient\DTO
 */
interface DeezerResultDTOInterface
{

    /**
     * @return int|null
     */
    public function getId();

    /**
     * @return string|null
     */
    public function getTitle();

    /**
     * @return string|null
     */
    public function getPreview();

    /**
     * @return string|null
     */
    public function getArtist();

}
