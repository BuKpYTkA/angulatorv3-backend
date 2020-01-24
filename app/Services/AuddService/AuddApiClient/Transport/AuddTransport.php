<?php
/**
 * Created by PhpStorm.
 * User: t.matskovich
 * Date: 21.01.2020
 * Time: 15:37
 */

namespace App\Services\AuddService\AuddApiClient\Transport;


use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class AuddTransport
 * @package App\Services\AuddService\AuddApiClient\Transport
 */
class AuddTransport implements AuddTransportInterface
{

    const METHOD_POST = 'POST';

    const METHOD_GET = 'GET';

    const STATUS_CODE_OK = 200;

    const API_STATUS_OK = 'success';

    /**
     * @var string
     */
    private $authToken;

    /**
     * @var string
     */
    private $apiEndpoint;

    /**
     * @var Client|null
     */
    private $client;

    /**
     * HttpTransportService constructor.
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
     * @throws AuddTransportException
     */
    public function get(string $url, array $params)
    {
        try {
            $response = $this->client->request(static::METHOD_GET, $url, ['query' => array_merge($params, ['api_token' => $this->authToken])]);
            $this->validate($response);
            return $this->parse($response);
        } catch (\Exception $e) {
            throw new AuddTransportException($e->getMessage(), $e->getCode());
        }
    }

    /**
     * @param string $url
     * @param array $params
     * @return array
     * @throws AuddTransportException
     */
    public function post(string $url, array $params)
    {
        try {
            $response = $this->client->request(static::METHOD_POST, $url, [
                'form_params' => array_merge($params, ['api_token' => $this->authToken])
            ]);
            $this->validate($response);
            return $this->parse($response);
        } catch (\Exception $e) {
            throw new AuddTransportException($e->getMessage(), $e->getCode());
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
        if (($response['status'] ?? null) !== static::API_STATUS_OK) {
            $error = json_encode($response);
            throw new \Exception('Error with Audd api: ' . $error, 500);
        }
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
