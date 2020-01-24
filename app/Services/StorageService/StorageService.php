<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 23.01.2020
 * Time: 17:32
 */

namespace App\Services\StorageService;

use Illuminate\Support\Facades\Storage;

/**
 * Class StorageService
 * @package App\Services\StorageService
 */
class StorageService implements StorageServiceInterface
{

    /**
     * @var string
     */
    private $disk;

    /**
     * StorageService constructor.
     * @param string $disk
     */
    public function __construct(string $disk)
    {
        $this->disk = $disk;
    }

    /**
     * @param $file
     * @param string $format
     * @return string
     */
    public function uploadByFormat($file, string $format = '')
    {
        $fileName = uniqid() . '.' . $format;
        Storage::disk($this->disk)->put($fileName, $file);
        return Storage::disk($this->disk)->url($fileName);
    }

}