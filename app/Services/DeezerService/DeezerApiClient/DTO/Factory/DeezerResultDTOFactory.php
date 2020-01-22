<?php
/**
 * Created by PhpStorm.
 * User: t.matskovich
 * Date: 21.01.2020
 * Time: 18:22
 */

namespace App\Services\DeezerService\DeezerApiClient\DTO\Factory;


use App\Services\DeezerService\DeezerApiClient\DTO\DeezerResultDTO;
use App\Services\DeezerService\DeezerApiClient\DTO\DeezerResultDTOInterface;

/**
 * Class DeezerResultDTOFactory
 * @package App\Services\DeezerService\DeezerApiClient\DTO\Factory
 */
class DeezerResultDTOFactory implements DeezerResultDTOFactoryInterface
{

    /**
     * @param array $response
     * @return DeezerResultDTOInterface
     */
    public function createDeezerResultDTOFromResponse(array $response)
    {
        return new DeezerResultDTO($response);
    }
}
