<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 24.01.2020
 * Time: 10:54
 */

namespace App\Services\Base64DecoderService\Factory;


use App\Services\Base64DecoderService\DTO\Base64ObjectDTOInterface;

/**
 * Class Base64ObjectDTOFactory
 * @package App\Services\Base64DecoderService\Factory
 */
interface Base64ObjectDTOFactoryInterface
{
    /**
     * @param array $data
     * @return Base64ObjectDTOInterface
     */
    public function create(array $data);
}