<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 24.01.2020
 * Time: 10:58
 */

namespace App\Services\Base64DecoderService;


/**
 * Class Base64DecoderService
 * @package App\Services\Base64DecoderService
 */
interface Base64DecoderServiceInterface
{
    /**
     * @param string $base64
     * @return DTO\Base64ObjectDTOInterface
     */
    public function decode(string $base64);
}