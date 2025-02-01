<?php

declare(strict_types=1);

namespace Devall\SignupWeather\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Devall\SignupWeather\Model\Pdf\Weather;

class DownloadPdf extends Action
{
    private $pdfWeather;

    public function __construct(
        Context $context,
        Weather $pdfWeather
    ) {
        parent::__construct($context);
        $this->pdfWeather = $pdfWeather;
    }

    public function execute()
    {
        $weatherData = $this->_objectManager->create('Devall\SignupWeather\Block\History')->getWeatherHistory();
        $pdfPath = $this->pdfWeather->generatePdf($weatherData);

        return $this->fileFactory->create(
            basename($pdfPath),
            ['type' => 'filename', 'value' => $pdfPath],
            \Magento\Framework\App\Filesystem\DirectoryList::VAR_DIR,
            'application/pdf'
        );
    }
}
