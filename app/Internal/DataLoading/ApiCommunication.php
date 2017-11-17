<?php

namespace App\Internal\DataLoading;

use App\Exceptions\GeneralException;
use App\Internal\DataLoading\Containsers\Url\IApiUrlContainer;
use GuzzleHttp\Client;
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
     * @param IApiUrlContainer $apiUrlContainer
     * @return mixed
     */
    public function requestData(IApiUrlContainer $apiUrlContainer)
    {
        $responseData = '';

        try {
            $response = $this->client->request('GET', $apiUrlContainer->getUrl(), [
                'on_headers' => function (ResponseInterface $response) {
                    $this->checkRightContentType($response);
                }
            ]);

            $responseData = $response->getBody();
        } catch (\Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }

        return $this->adjustJsonData($responseData);
    }

    /**
     * @param ResponseInterface $response
     * @throws GeneralException
     */
    private function checkRightContentType(ResponseInterface $response)
    {
        if (!$response->hasHeader('Content-Type')) {
            throw new GeneralException('Missing header Content-Type!');
        }

        if ($response->getHeaderLine('Content-Type') !== 'application/json') {
            throw new GeneralException('Missing Content-Type application/json!');
        }
    }

    /**
     * @param $jsonData
     * @return mixed
     */
    private function adjustJsonData($jsonData)
    {
        $jsonData = json_decode($jsonData);

        if (!is_null($jsonData)) {
            foreach ($jsonData as $key => &$value) {
                if (is_array($value) && empty($value)) {
                    $value = null;
                }
            }
        }

        return $jsonData;
    }
}
