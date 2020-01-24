<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 23.01.2020
 * Time: 18:16
 */

namespace App\Services\StorageService;


/**
 * Class StorageService
 * @package App\Services\StorageService
 */
interface StorageServiceInterface
{
    /**
     * @param $file
     * @param string $format
     * @return string
     */
    public function uploadByFormat($file, string $format = '');
}