<?php
/**
 * Created by PhpStorm.
 * User: t.matskovich
 * Date: 22.01.2020
 * Time: 10:34
 */

namespace App\Services\AudioService;


use App\Services\DeezerService\DeezerApiClient\DTO\DeezerResultDTOInterface;

/**
 * Interface AudioServiceInterface
 * @package App\Services\AudioService
 */
interface AudioServiceInterface
{

    /**
     * @param string $sourceUrl
     * @return DeezerResultDTOInterface
     */
    public function recognizeByMusic(string $sourceUrl);

    /**
     * @param string $sourceUrl
     * @return DeezerResultDTOInterface
     */
    public function recognizeByHumming(string $sourceUrl);

    /**
     * @param string $text
     * @return DeezerResultDTOInterface
     */
    public function recognizeByText(string $text);

}
