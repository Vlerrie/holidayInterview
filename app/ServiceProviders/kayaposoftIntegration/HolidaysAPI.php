<?php


namespace App\ServiceProviders\kayaposoftIntegration;


use Exception;
use GuzzleHttp\Client;

class HolidaysAPI
{
    /**
     * https://kayaposoft.com/enrico/json/v2.0/
     */
    protected $baseUri = 'https://kayaposoft.com/enrico/json/v2.0/';
    public $requestStatus;

    public function guzzle($method, $endpoint)
    {
        $client = new Client(['base_uri' => $this->baseUri]);
        $response = $client->request($method, $endpoint);
        $this->requestStatus = $response->getStatusCode();

        if ($response->getStatusCode() !== 200){
            throw new Exception('Kayaposoft api error, please check the endpoint:'.$this->baseUri.$endpoint);
        }

        return json_decode($response->getBody()->getContents());
    }
}
