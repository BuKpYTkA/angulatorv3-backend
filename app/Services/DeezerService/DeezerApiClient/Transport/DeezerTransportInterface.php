<?php
/**
 * Created by PhpStorm.
 * User: t.matskovich
 * Date: 21.01.2020
 * Time: 17:23
 */

namespace App\Services\DeezerService\DeezerApiClient\Transport;


/**
 * Interface DeezerTransportInterface
 * @package App\Services\DeezerService\DeezerApiClient\Transport
 */
interface DeezerTransportInterface
{

    /**
     * @param string $url
     * @param array $params
     * @return array
     */
    public function get(string $url, array $params = []);

    /**
     * @param string $url
     * @param array $params
     * @return array
     */
    public function post(string $url, array $params = []);

}
