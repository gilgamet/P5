<?php
/**
 * Created by PhpStorm.
 * User: gilgamet
 * Date: 18/02/2019
 * Time: 09:21
 */

namespace App\Weather;

use GuzzleHttp\Client;
use Symfony\Component\Serializer\Serializer;

class Weather
{
    private $weatherClient;
    private $serializer;
    private $apiKey = '3433f5fa760f4aee81f95221190602';

    /**
     * Weather constructor.
     * @param $weatherClient
     * @param Serializer $serializer
     * @param $apiKey
     */
    public function __construct(Client $weatherClient, Serializer $serializer, $apiKey )
    {
        $this->apiKey = $apiKey;
        $this->weatherClient = $weatherClient;
        $this->serializer = $serializer;
    }

    public function getWeather()
    {
        $uri = 'v1/current.json?key=' .$this->apiKey.'&q=Malijai';
        $response = $this->weatherClient->get($uri);

        $data = $this->serializer->deserialize(
            $response->getBody()->getContents(),
            'array',
            'json'
        );
        return [
            'temp_c' => $data['temperature'],
            'feelslike_c' => $data['temperature_ressentie']
        ];
    }
}