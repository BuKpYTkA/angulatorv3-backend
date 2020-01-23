<?php
/**
 * Created by PhpStorm.
 * User: t.matskovich
 * Date: 21.01.2020
 * Time: 16:20
 */

namespace App\Services\AuddService\AuddApiClient\DTO\Factory;

use App\Services\AuddService\AuddApiClient\DTO\AuddResultDTOInterface;
use App\Services\AuddService\AuddApiClient\DTO\AuddResultDTO;

/**
 * Class AuddResultDTOFactory
 * @package App\Services\AuddService\AuddApiClient\DTO\Factory
 */
class AuddResultDTOFactory implements AuddResultDTOFactoryInterface
{

    /**
     * @param array $response
     * @return AuddResultDTOInterface
     */
    public function createAuddResultDTOFromMusic(array $response)
    {
        $result = $response['result'] ?? [];
        return new AuddResultDTO($result);
    }

    /**
     * @param array $response
     * @return AuddResultDTOInterface
     */
    public function createAuddResultDTOFromHumming(array $response)
    {
        $data = [];
        $result = $response['result'] ?? [];
        $list = $result['list'] ?? [];
        if (!empty($list)) {
            $found = array_shift($list);
            $data['artist'] = $found['artist'] ?? null;
            $data['title'] = $found['title'] ?? null;
        }
        return new AuddResultDTO($data);
    }

    /**
     * @param array $response
     * @return AuddResultDTOInterface
     */
    public function createAuddResultDTOFromText(array $response)
    {
        $data = $response['result'][0] ?? [];
        return new AuddResultDTO($data);

    }
}
