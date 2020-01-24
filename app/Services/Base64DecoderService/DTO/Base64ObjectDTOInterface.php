<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 24.01.2020
 * Time: 10:54
 */

namespace App\Services\Base64DecoderService\DTO;


/**
 * Class Base64ObjectDTO
 * @package App\Services\Base64DecoderService\DTO
 */
interface Base64ObjectDTOInterface
{
    /**
     * @return string
     */
    public function getBase64String();

    /**
     * @return string
     */
    public function getDataFormat();

    /**
     * @return string
     */
    public function getFile();
}