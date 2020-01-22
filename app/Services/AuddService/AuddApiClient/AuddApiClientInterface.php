<?php
/**
 * Created by PhpStorm.
 * User: t.matskovich
 * Date: 21.01.2020
 * Time: 14:42
 */

namespace App\Services\AuddService\AuddApiClient;

use App\Services\AuddService\AuddApiClient\DTO\AuddResultDTOInterface;

/**
 * Interface AuddApiClientInterface
 * @package App\Services\AuddService\AuddApiClient
 */
interface AuddApiClientInterface
{

    /**
     * @param string $url
     * @param array $return
     * @return AuddResultDTOInterface
     */
    public function recognizeByMusic(string $url, array $return);

    /**
     * @param string $url
     * @return AuddResultDTOInterface
     */
    public function recognizeByHumming(string $url);

    /**
     * @param string $text
     * @return AuddResultDTOInterface
     */
    public function recognizeByText(string $text);

}
