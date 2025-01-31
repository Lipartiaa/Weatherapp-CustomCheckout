<?php

declare(strict_types=1);

namespace Devall\SignupWeather\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Devall\SignupWeather\Model\WeatherApi;

class Weather extends Action
{
    private JsonFactory $resultJsonFactory;
    private WeatherApi $weatherApi;

    public function __construct(
        Context $context,
        JsonFactory $resultJsonFactory,
        WeatherApi $weatherApi
    ) {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
        $this->weatherApi = $weatherApi;
    }

    public function execute()
    {
        $city = $this->getRequest()->getParam('city', 'Tbilisi');
        $weatherData = $this->weatherApi->getWeather($city);

        return $this->resultJsonFactory->create()->setData($weatherData);
    }
}
