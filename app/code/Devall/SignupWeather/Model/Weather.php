<?php

declare(strict_types=1);

namespace Devall\SignupWeather\Model;

use Magento\Framework\Model\AbstractModel;
use Devall\SignupWeather\Api\Data\WeatherInterface;

class Weather extends AbstractModel implements WeatherInterface
{
    protected $_idFieldName = 'weather_id';
    protected $_idType = \Magento\Framework\DataObject::TYPE_INTEGER;
    protected $_primaryKey = 'weather_id';
    protected $_table = 'devall_signup_weather';

    protected $city;
    protected $temperature;
    protected $date;

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getTemperature()
    {
        return $this->temperature;
    }

    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
}
