<?php

namespace App\Internal\DataLoading;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;

class ApiCommunication
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function requestData(IApiUrlUKF $apiUrlUKF)
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
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        return $this->transformToJSON($responseData);
    }

    private function checkRightContentType(ResponseInterface $response)
    {
        if (!$response->hasHeader('Content-Type')) {
            throw new \Exception('Missing header Content-Type!');
        }

        if ($response->getHeaderLine('Content-Type') !== 'application/json') {
            throw new \Exception('The file is too big!');
        }
    }

    private function transformToJSON($data)
    {
        return json_decode($data);
    }
}