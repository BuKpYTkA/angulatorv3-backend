<?php
/**
 * Created by PhpStorm.
 * User: t.matskovich
 * Date: 21.01.2020
 * Time: 17:23
 */

namespace App\Services\DeezerService\DeezerApiClient\Transport;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class DeezerTransport
 * @package App\Services\DeezerService\DeezerApiClient\Transport
 */
class DeezerTransport implements DeezerTransportInterface
{

    const METHOD_GET = 'GET';

    const METHOD_POST = 'POST';

    const STATUS_CODE_OK = 200;

    /**
     * @var string
     */
    private $authToken;

    /**
     * @var string
     */
    private $apiEndpoint;

    /**
     * @var Client
     */
    private $client;

    /**
     * DeezerTransport constructor.
     * @param string $authToken
     * @param string $apiEndpoint
     * @param Client|null $client
     */
    public function __construct(string $authToken, string $apiEndpoint, Client $client = null)
    {
        $this->authToken = $authToken;
        $this->apiEndpoint = $apiEndpoint;
        if (!$client) {
            $client = new Client([
                'base_uri' => $this->apiEndpoint
            ]);
        }
        $this->client = $client;
    }

    /**
     * @param string $url
     * @param array $params
     * @return array
     * @throws DeezerTransportException
     */
    public function get(string $url, array $params = [])
    {
        try {
            $response = $this->client->request(static::METHOD_GET, $url, [
                'query' => $params
            ]);
            $this->validate($response);
            return $this->parse($response);
        } catch (\Exception $e) {
            throw new DeezerTransportException($e->getMessage(), $e->getCode());
        }
    }

    /**
     * @param string $url
     * @param array $params
     * @return array
     * @throws DeezerTransportException
     */
    public function post(string $url, array $params = [])
    {
        try {
            $response = $this->client->request(static::METHOD_POST, $url, [
                'form_params' => $params
            ]);
            $this->validate($response);
            return $this->parse($response);
        } catch (\Exception $e) {
            throw new DeezerTransportException($e->getMessage(), $e->getCode());
        }
    }

    /**
     * @param ResponseInterface $response
     * @throws \Exception
     */
    private function validate(ResponseInterface $response)
    {
        if ($response->getStatusCode() !== static::STATUS_CODE_OK) {
            throw new \Exception('Error: ' . $response->getReasonPhrase(), $response->getStatusCode());
        }
        $response = $this->parse($response);
        if (!$response) {
            $this->throwException();
        }
        if (!isset($response['data'])) {
            if (!isset($response['id'])) {
                $this->throwException();
            }
        }
    }

    private function throwException()
    {
        throw new \Exception('Error with Deezer api', 500);
    }

    /**
     * @param ResponseInterface $response
     * @return array
     */
    private function parse(ResponseInterface $response)
    {
        $body = $response->getBody();
        $stringBody = (string)$body;
        return json_decode($stringBody, true);
    }
}
