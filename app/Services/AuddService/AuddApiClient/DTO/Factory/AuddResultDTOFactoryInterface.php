<?php
/**
 * Created by PhpStorm.
 * User: t.matskovich
 * Date: 21.01.2020
 * Time: 16:19
 */

namespace App\Services\AuddService\AuddApiClient\DTO\Factory;

use App\Services\AuddService\AuddApiClient\DTO\AuddResultDTOInterface;

/**
 * Interface AuddResultDTOFactoryInterface
 * @package App\Services\AuddService\AuddApiClient\DTO\Factory
 */
interface AuddResultDTOFactoryInterface
{

    /**
     * @param array $response
     * @return AuddResultDTOInterface
     */
    public function createAuddResultDTOFromMusic(array $response);

    /**
     * @param array $response
     * @return AuddResultDTOInterface
     */
    public function createAuddResultDTOFromHumming(array $response);

    /**
     * @param array $response
     * @return AuddResultDTOInterface
     */
    public function createAuddResultDTOFromText(array $response);

}
