<?php
/**
 * Created by PhpStorm.
 * User: t.matskovich
 * Date: 21.01.2020
 * Time: 17:21
 */

namespace App\Services\DeezerService\DeezerApiClient;

use App\Services\DeezerService\DeezerApiClient\DTO\DeezerResultDTOInterface;

/**
 * Interface DeezerApiClientInterface
 * @package App\Services\DeezerService\DeezerApiClient
 */
interface DeezerApiClientInterface
{

    /**
     * @param string|int $trackId
     * @return DeezerResultDTOInterface
     */
    public function getDeezerTrack($trackId);

    /**
     * @param string $searchQuery
     * @return DeezerResultDTOInterface mixed
     */
    public function searchTrack($searchQuery);

}
