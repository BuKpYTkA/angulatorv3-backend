<?php
/**
 * Created by PhpStorm.
 * User: t.matskovich
 * Date: 22.01.2020
 * Time: 10:40
 */

namespace App\Services\AudioService;


use App\Services\AuddService\AuddApiClient\AuddApiClientInterface;
use App\Services\AuddService\AuddApiClient\DTO\AuddResultDTOInterface;
use App\Services\DeezerService\DeezerApiClient\DeezerApiClientInterface;
use App\Services\DeezerService\DeezerApiClient\DTO\DeezerResultDTOInterface;

/**
 * Class AudioService
 * @package App\Services\AudioService
 */
class AudioService implements AudioServiceInterface
{

    /**
     * @var AuddApiClientInterface
     */
    private $auddApiClient;

    /**
     * @var DeezerApiClientInterface
     */
    private $deezerApiClient;

    /**
     * AudioService constructor.
     * @param AuddApiClientInterface $auddApiClient
     * @param DeezerApiClientInterface $deezerApiClient
     */
    public function __construct(
        AuddApiClientInterface $auddApiClient,
        DeezerApiClientInterface $deezerApiClient
    )
    {
        $this->auddApiClient = $auddApiClient;
        $this->deezerApiClient = $deezerApiClient;
    }

    /**
     * @param string $sourceUrl
     * @return DeezerResultDTOInterface
     * @throws AudioServiceException
     */
    public function recognizeByMusic(string $sourceUrl)
    {
        $auddResultDTO = $this->auddApiClient->recognizeByMusic($sourceUrl, ['deezer']);
        $deezerId = $auddResultDTO->getDeezerId();
        if (!$deezerId) {
            throw new AudioServiceException('Missing Deezer result from Audd.io API', 500);
        }
        return $this->deezerApiClient->getDeezerTrack($deezerId);

    }

    /**
     * @param string $sourceUrl
     * @return DeezerResultDTOInterface
     * @throws AudioServiceException
     */
    public function recognizeByHumming(string $sourceUrl)
    {
        $auddResultDTO = $this->auddApiClient->recognizeByHumming($sourceUrl);
        $searchQuery = $this->makeSearchTextFromAuddResult($auddResultDTO);
        return $this->deezerApiClient->searchTrack($searchQuery);
    }

    /**
     * @param AuddResultDTOInterface $auddResultDTO
     * @return string
     */
    private function makeSearchTextFromAuddResult(AuddResultDTOInterface $auddResultDTO)
    {
        return $auddResultDTO->getArtist() . $auddResultDTO->getTitle();
    }

    /**
     * @param string $text
     * @return DeezerResultDTOInterface
     */
    public function recognizeByText(string $text)
    {
        $auddResultDTO = $this->auddApiClient->recognizeByText($text);
        $searchQuery = $this->makeSearchTextFromAuddResult($auddResultDTO);
        return $this->deezerApiClient->searchTrack($searchQuery);
    }
}