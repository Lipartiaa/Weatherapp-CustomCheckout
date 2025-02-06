<?php

declare(strict_types=1);

namespace Devall\SignupWeather\Model\Pdf;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Filesystem\DirectoryList;
use Zend_Pdf;

class Weather
{
    private $context;
    private $directoryList;

    public function __construct(Context $context, DirectoryList $directoryList)
    {
        $this->context = $context;
        $this->directoryList = $directoryList;
    }

    public function generatePdf($weatherData)
    {
        $pdf = new Zend_Pdf();
        $page = $pdf->newPage(Zend_Pdf_Page::SIZE_A4);
        $pdf->pages[] = $page;

        $font = Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD);
        $page->setFont($font, 12);
        $page->drawText('Weather Data', 100, 800);

        $yPosition = 780;
        foreach ($weatherData as $data) {
            $page->drawText('City: ' . $data['city'], 100, $yPosition);
            $page->drawText('Temperature: ' . $data['temperature'], 100, $yPosition - 20);
            $page->drawText('Date: ' . $data['date'], 100, $yPosition - 40);
            $yPosition -= 60;
        }

        $fileName = 'weather_data_' . time() . '.pdf';
        $filePath = $this->directoryList->getPath(DirectoryList::VAR_DIR) . '/pdf/' . $fileName;
        $pdf->save($filePath);

        return $filePath;
    }
}
