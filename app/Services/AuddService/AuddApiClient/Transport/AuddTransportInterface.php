<?php
/**
 * Created by PhpStorm.
 * User: t.matskovich
 * Date: 21.01.2020
 * Time: 15:36
 */

namespace App\Services\AuddService\AuddApiClient\Transport;

/**
 * Interface AuddTransportInterface
 * @package App\Services\AuddService\AuddApiClient\Transport
 */
interface AuddTransportInterface
{

    /**
     * @param string $url
     * @param array $params
     * @return array
     */
    public function get(string $url, array $params);

    /**
     * @param string $url
     * @param array $params
     * @return array
     */
    public function post(string $url, array $params);

}
