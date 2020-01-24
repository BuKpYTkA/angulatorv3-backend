<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 24.01.2020
 * Time: 10:47
 */

namespace App\Services\Base64DecoderService\DTO;

/**
 * Class Base64ObjectDTO
 * @package App\Services\Base64DecoderService\DTO
 */
class Base64ObjectDTO implements Base64ObjectDTOInterface
{

    const DELIMITER = '/';

    /**
     * @var array
     */
    private $data;

    /**
     * Base64ObjectDTO constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getBase64String()
    {
        return $this->data[1] ?? '';
    }

    /**
     * @return string
     */
    public function getDataFormat()
    {
        return $this->getType();
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return base64_decode($this->getBase64String());
    }

    /**
     * @return string
     */
    private function getType()
    {
        if (!isset($this->data[0])) {
            return '';
        }
        $exploded = explode(self::DELIMITER, $this->data[0]);
        if (!isset($exploded[1])) {
            return '';
        }
        return str_replace(';', '', $exploded[1]);
    }

}