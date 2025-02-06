<?php

declare(strict_types=1);

namespace Devall\SignupWeather\Model;

use Magento\Framework\HTTP\Client\Curl;

class WeatherData
{
    private Curl $curl;

    public function __construct(Curl $curl)
    {
        $this->curl = $curl;
    }

    public function getWeatherData($city, $apiKey)
    {
        $url = "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";
        $this->curl->get($url);

        $response = $this->curl->getBody();
        return json_decode($response, true);
    }
}
