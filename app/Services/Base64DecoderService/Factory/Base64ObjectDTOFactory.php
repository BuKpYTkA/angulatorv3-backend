<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 24.01.2020
 * Time: 10:52
 */

namespace App\Services\Base64DecoderService\Factory;

use App\Services\Base64DecoderService\DTO\Base64ObjectDTO;
use App\Services\Base64DecoderService\DTO\Base64ObjectDTOInterface;

/**
 * Class Base64ObjectDTOFactory
 * @package App\Services\Base64DecoderService\Factory
 */
class Base64ObjectDTOFactory implements Base64ObjectDTOFactoryInterface
{

    /**
     * @param array $data
     * @return Base64ObjectDTOInterface
     */
    public function create(array $data)
    {
        return new Base64ObjectDTO($data);
    }
}