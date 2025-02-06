<?php

declare(strict_types=1);

namespace Devall\SignupWeather\Block;

use Magento\Framework\View\Element\Template;
use Devall\SignupWeather\Model\ResourceModel\Weather\CollectionFactory;
use Magento\Framework\Registry;

class History extends Template
{
    private $weatherCollectionFactory;
    private $registry;

    public function __construct(
        Template\Context $context,
        CollectionFactory $weatherCollectionFactory,
        Registry $registry,
        array $data = []
    ) {
        $this->weatherCollectionFactory = $weatherCollectionFactory;
        $this->registry = $registry;
        parent::__construct($context, $data);
    }

    public function getWeatherHistory()
    {
        $collection = $this->weatherCollectionFactory->create();

        $city = $this->registry->registry('weather_city');
        $startDate = $this->registry->registry('weather_start_date');
        $endDate = $this->registry->registry('weather_end_date');

        if ($city) {
            $collection->addFieldToFilter('city', ['like' => '%' . $city . '%']);
        }

        if ($startDate) {
            $collection->addFieldToFilter('date', ['gteq' => $startDate]);
        }

        if ($endDate) {
            $collection->addFieldToFilter('date', ['lteq' => $endDate]);
        }

        return $collection->getItems();
    }
}
