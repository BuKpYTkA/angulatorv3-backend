<?php
/**
 * Created by PhpStorm.
 * User: t.matskovich
 * Date: 21.01.2020
 * Time: 14:42
 */

namespace App\Services\AuddService\AuddApiClient;

use App\Services\AuddService\AuddApiClient\DTO\AuddResultDTOInterface;
use App\Services\AuddService\AuddApiClient\DTO\Factory\AuddResultDTOFactoryInterface;
use App\Services\AuddService\AuddApiClient\Transport\AuddTransportInterface;

/**
 * Class AuddApiClient
 * @package App\Services\AuddService\AuddApiClient
 */
class AuddApiClient implements AuddApiClientInterface
{

    const RECOGNIZE_WITH_OFFSET = 'recognizeWithOffset';

    const FIND_BY_LYRICS = 'findLyrics';

    /**
     * @var AuddTransportInterface
     */
    private $transport;

    /**
     * @var AuddResultDTOFactoryInterface
     */
    private $auddResultDTOFactory;

    /**
     * AuddApiClient constructor.
     * @param AuddTransportInterface $transport
     * @param AuddResultDTOFactoryInterface $auddResultDTOFactory
     */
    public function __construct(
        AuddTransportInterface $transport,
        AuddResultDTOFactoryInterface $auddResultDTOFactory
    )
    {
        $this->transport = $transport;
        $this->auddResultDTOFactory = $auddResultDTOFactory;
    }

    /**
     * @param string $url
     * @param array $return
     * @return AuddResultDTOInterface
     */
    public function recognizeByMusic(string $url, array $return)
    {
        $response = $this->transport->get('', [
            'url' => $url,
            'return' => implode(',', $return)
        ]);
        return $this->auddResultDTOFactory->createAuddResultDTOFromMusic($response);
    }

    /**
     * @param string $url
     * @return AuddResultDTOInterface
     */
    public function recognizeByHumming(string $url)
    {
        $response = $this->transport->get(static::RECOGNIZE_WITH_OFFSET, [
            'url' => $url
        ]);
        return $this->auddResultDTOFactory->createAuddResultDTOFromHumming($response);
    }

    /**
     * @param string $text
     * @return AuddResultDTOInterface
     */
    public function recognizeByText(string $text)
    {
        $response = $this->transport->get(static::FIND_BY_LYRICS, [
            'q' => $text
        ]);
        return $this->auddResultDTOFactory->createAuddResultDTOFromText($response);
    }

}
