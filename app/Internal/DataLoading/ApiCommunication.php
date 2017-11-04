<?php

namespace App\Internal\DataLoading;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ApiCommunication
 * @package App\Internal\DataLoading
 */
class ApiCommunication
{
    /**
     * @var Client
     */
    private $client;

    /**
     * ApiCommunication constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param IApiUrlUKF $apiUrlUKF
     * @return object
     */
    public function requestData(IApiUrlUKF $apiUrlUKF) : object
    {
        $responseData = array();

        try {
            $response = $this->client->request('GET', $apiUrlUKF->getUrl(), [
                'on_headers' => function (ResponseInterface $response) {
                    $this->checkRightContentType($response);
                }
            ]);

            $responseData = $response->getBody();
        } catch (ClientException $e) {
            echo $e->getMessage();
        } catch (GeneralException $e) {
            echo $e->getMessage();
        }

        return $this->transformToJSON($responseData);
    }

    /**
     * @param ResponseInterface $response
     */
    private function checkRightContentType(ResponseInterface $response)
    {
        if (!$response->hasHeader('Content-Type')) {
            throw new GeneralException('Missing header Content-Type!');
        }

        if ($response->getHeaderLine('Content-Type') !== 'application/json') {
            throw new GeneralException('The file is too big!');
        }
    }

    /**
     * @param string $data
     * @return object
     */
    private function transformToJSON(string $data) : object
    {
        return json_decode($data);
    }
}