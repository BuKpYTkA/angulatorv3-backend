<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 24.01.2020
 * Time: 10:36
 */

namespace App\Services\Base64DecoderService;

use App\Services\Base64DecoderService\Factory\Base64ObjectDTOFactoryInterface;

/**
 * Class Base64DecoderService
 * @package App\Services\Base64DecoderService
 */
class Base64DecoderService implements Base64DecoderServiceInterface
{

    const BASE_64_DELIMITER = 'base64,';

    /**
     * @var Base64ObjectDTOFactoryInterface
     */
    private $base64ObjectFactory;

    /**
     * Base64DecoderService constructor.
     * @param Base64ObjectDTOFactoryInterface $base64ObjectFactory
     */
    public function __construct(Base64ObjectDTOFactoryInterface $base64ObjectFactory)
    {
        $this->base64ObjectFactory = $base64ObjectFactory;
    }

    /**
     * @param string $base64
     * @return DTO\Base64ObjectDTOInterface
     */
    public function decode(string $base64)
    {
        $exploded = explode(self::BASE_64_DELIMITER, $base64);
        return $this->base64ObjectFactory->create($exploded);
    }

}