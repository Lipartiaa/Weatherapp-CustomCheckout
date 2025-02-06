<?php

namespace Devall\SignupWeather\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\App\RequestInterface;

class Weather extends Action
{
    protected $jsonFactory;
    protected $request;

    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        RequestInterface $request
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->request = $request;
    }

    public function execute()
    {
        $resultJson = $this->jsonFactory->create();
        $city = $this->request->getParam('city');

        if (!$city) {
            return $resultJson->setData(['error' => 'ქალაქის სახელი სავალდებულოა!']);
        }

        $apiKey = 'ff56ed4694fc5f46de4262bb192b5ee3';
        $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=" . urlencode($city) . "&appid=" . $apiKey . "&units=metric&lang=ge";

        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            curl_close($ch);

            if (!$response) {
                return $resultJson->setData(['error' => 'API-თან დაკავშირების შეცდომა!']);
            }

            return $resultJson->setData(json_decode($response, true));
        } catch (\Exception $e) {
            return $resultJson->setData(['error' => 'სისტემური შეცდომა: ' . $e->getMessage()]);
        }
    }
}
