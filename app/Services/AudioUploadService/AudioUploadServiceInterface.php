<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 23.01.2020
 * Time: 18:17
 */

namespace App\Services\AudioUploadService;


/**
 * Class AudioUploadService
 * @package App\Services\AudioUploadService
 */
interface AudioUploadServiceInterface
{
    /**
     * @param string $base64
     * @return string
     */
    public function uploadFromBase64(string $base64);
}