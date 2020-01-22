<?php
/**
 * Created by PhpStorm.
 * User: t.matskovich
 * Date: 22.01.2020
 * Time: 11:11
 */

namespace App\Services\AudioService;


use App\Services\DeezerService\DeezerApiClient\DTO\DeezerResultDTO;
use App\Services\DeezerService\DeezerApiClient\DTO\DeezerResultDTOInterface;

/**
 * Class MockAudioService
 * @package App\Services\AudioService
 */
class MockAudioService implements AudioServiceInterface
{

    /**
     * @param string $sourceUrl
     * @return DeezerResultDTOInterface
     */
    public function recognizeByMusic(string $sourceUrl)
    {
        return new DeezerResultDTO($this->createMockResponse());
    }

    /**
     * @param string $sourceUrl
     * @return DeezerResultDTOInterface
     */
    public function recognizeByHumming(string $sourceUrl)
    {
        return new DeezerResultDTO($this->createMockResponse());
    }

    /**
     * @param string $text
     * @return DeezerResultDTOInterface
     */
    public function recognizeByText(string $text)
    {
        return new DeezerResultDTO($this->createMockResponse());
    }

    /**
     * @return array
     */
    private function createMockResponse()
    {
        $response = [];
        $response['id'] = 854914332;
        $response['title'] = 'Darkness';
        $response['preview'] = 'https://cdns-preview-2.dzcdn.net/stream/c-243c0a920bc2c41b18bcd8a20ca5ee41-4.mp3';
        $response['artist']['name'] = 'Eminem';
        return $response;
    }
}
