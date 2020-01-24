<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 23.01.2020
 * Time: 18:16
 */

namespace App\Services\AudioUploadService;

use App\Services\Base64DecoderService\Base64DecoderServiceInterface;
use App\Services\StorageService\StorageServiceInterface;

/**
 * Class AudioUploadService
 * @package App\Services\AudioUploadService
 */
class AudioUploadService implements AudioUploadServiceInterface
{

    const DEFAULT_AUDIO_FORMAT = 'mp3';

    /**
     * @var StorageServiceInterface
     */
    private $storageService;

    /**
     * @var Base64DecoderServiceInterface
     */
    private $base64DecoderService;

    /**
     * AudioUploadService constructor.
     * @param StorageServiceInterface $storageService
     * @param Base64DecoderServiceInterface $base64DecoderService
     */
    public function __construct(StorageServiceInterface $storageService, Base64DecoderServiceInterface $base64DecoderService)
    {
        $this->storageService = $storageService;
        $this->base64DecoderService = $base64DecoderService;
    }

    /**
     * @param string $base64
     * @return string
     */
    public function uploadFromBase64(string $base64)
    {
        $base64Object = $this->base64DecoderService->decode($base64);
        return $this->storageService->uploadByFormat($base64Object->getFile(), self::DEFAULT_AUDIO_FORMAT);
    }

}