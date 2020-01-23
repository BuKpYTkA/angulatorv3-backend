<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 23.01.2020
 * Time: 18:16
 */

namespace App\Services\AudioUploadService;

use App\Services\StorageService\StorageServiceInterface;

/**
 * Class AudioUploadService
 * @package App\Services\AudioUploadService
 */
class AudioUploadService implements AudioUploadServiceInterface
{

    /**
     * @var StorageServiceInterface
     */
    private $storageService;

    /**
     * AudioUploadService constructor.
     * @param StorageServiceInterface $storageService
     */
    public function __construct(StorageServiceInterface $storageService)
    {
        $this->storageService = $storageService;
    }

    /**
     * @param string $base64
     * @return string
     */
    public function uploadFromBase64(string $base64)
    {
        $file = base64_decode($base64);
        return $this->storageService->uploadMp3($file);
    }

}