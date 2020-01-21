<?php
/**
 * Created by PhpStorm.
 * User: t.matskovich
 * Date: 21.01.2020
 * Time: 17:22
 */

namespace App\Services\DeezerService\DeezerApiClient;

use App\Services\DeezerService\DeezerApiClient\DTO\Factory\DeezerResultDTOFactoryInterface;
use App\Services\DeezerService\DeezerApiClient\Transport\DeezerTransportInterface;

/**
 * Class DeezerApiClient
 * @package App\Services\DeezerService\DeezerApiClient
 */
class DeezerApiClient implements DeezerApiClientInterface
{

    const TRACK_ENDPOINT = 'track';

    /**
     * @var DeezerTransportInterface
     */
    private $transport;

    /**
     * @var DeezerResultDTOFactoryInterface
     */
    private $deezerResultDTOFactory;

    /**
     * DeezerApiClient constructor.
     * @param DeezerTransportInterface $transport
     * @param DeezerResultDTOFactoryInterface $deezerResultDTOFactory
     */
    public function __construct(
        DeezerTransportInterface $transport,
        DeezerResultDTOFactoryInterface $deezerResultDTOFactory
    )
    {
        $this->transport = $transport;
        $this->deezerResultDTOFactory = $deezerResultDTOFactory;
    }

    /**
     * @param int|string $trackId
     * @return DeezerResultDTOInterface
     */
    public function getDeezerTrack($trackId)
    {
        $uri = static::TRACK_ENDPOINT . '/' . $trackId;
        $response = $this->transport->get($uri);
        return $this->deezerResultDTOFactory->createDeezerResultDTOFromResponse($response);
    }

}
