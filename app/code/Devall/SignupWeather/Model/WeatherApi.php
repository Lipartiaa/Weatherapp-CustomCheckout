<?php

declare(strict_types=1);

namespace Devall\SignupWeather\Model;

use Magento\Framework\HTTP\Client\Curl;
use Psr\Log\LoggerInterface;

class WeatherApi
{
    private const API_URL = 'http://api.openweathermap.org/data/2.5/weather';

    private Curl $curl;
    private LoggerInterface $logger;
    private string $apiKey;

    public function __construct(
        Curl $curl,
        LoggerInterface $logger
    ) {
        $this->curl = $curl;
        $this->logger = $logger;
        $this->apiKey = 'ff56ed4694fc5f46de4262bb192b5ee3';
    }

    public function getWeather(string $city): array
    {
        $url = self::API_URL . "?q=" . urlencode($city) . "&appid=" . $this->apiKey . "&units=metric&lang=ka";

        try {
            $this->curl->get($url);
            $response = json_decode($this->curl->getBody(), true);

            if (isset($response['cod']) && $response['cod'] !== 200) {
                throw new \Exception($response['message'] ?? 'Error fetching weather data');
            }

            return $response;
        } catch (\Exception $e) {
            $this->logger->error("Weather API error: " . $e->getMessage());
            return [];
        }
    }
}
