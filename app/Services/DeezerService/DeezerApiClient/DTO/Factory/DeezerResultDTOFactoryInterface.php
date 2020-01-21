<?php
/**
 * Created by PhpStorm.
 * User: t.matskovich
 * Date: 21.01.2020
 * Time: 18:22
 */

namespace App\Services\DeezerService\DeezerApiClient\DTO\Factory;

use App\Services\DeezerService\DeezerApiClient\DTO\DeezerResultDTOInterface;

/**
 * Interface DeezerResultDTOFactoryInterface
 * @package App\Services\DeezerService\DeezerApiClient\DTO\Factory
 */
interface DeezerResultDTOFactoryInterface
{

    /**
     * @param array $response
     * @return DeezerResultDTOInterface
     */
    public function createDeezerResultDTOFromResponse(array $response);

}
