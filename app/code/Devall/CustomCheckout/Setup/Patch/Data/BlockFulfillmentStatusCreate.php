<?php
declare(strict_types = 1);

namespace Devall\CustomCheckout\Setup\Patch\Data;

use Devall\SimpleData\Setup\Patch\SimpleDataPatch;
use Magento\Cms\Api\Data\BlockInterface;
use Magento\Cms\Api\BlockRepositoryInterface;
use Magento\Framework\Exception\LocalizedException;
use Psr\Log\LoggerInterface;

class BlockFulfillmentStatusCreate extends SimpleDataPatch
{
    /**
     * @var BlockRepositoryInterface
     */
    private $blockRepository;

    /**
     * @var BlockInterface
     */
    private $blockFactory;

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(
        BlockRepositoryInterface $blockRepository,
        BlockInterface $blockFactory,
        LoggerInterface $logger // logger დაკონსტრუქტორება
    ) {
        $this->blockRepository = $blockRepository;
        $this->blockFactory = $blockFactory;
        $this->logger = $logger; // logger-ის ინიციალიზაცია
    }

    public function apply(): self
    {
        try {
            // CMS ბლოკის შემოწმება უკვე არსებობს თუ არა
            $block = $this->blockRepository->getById('fulfillment_status');

            if (!$block) {
                // ახალი CMS ბლოკის შექმნა, თუ არ არსებობს
                $block = $this->blockFactory->create();
                $block->setIdentifier('fulfillment_status');
            }

            // ბლოკის მონაცემების განახლება/შენახვა
            $block->setTitle('Fulfillment Status');
            $block->setContent(
                <<<CONTENT
                <style>#html-body [data-pb-style=U2O5234]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}</style><div data-content-type="row" data-appearance="contained" data-element="main"><div data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="inner" data-pb-style="U2O5234"><div data-content-type="text" data-appearance="default" data-element="main"><p><strong>Fulfillment status:</strong> Orders are currently shipped out within 48 hours.</p></div></div></div>
                CONTENT
            );
            $block->setIsActive(1); // გააქტიურება

            $this->blockRepository->save($block); // CMS ბლოკის შენახვა
        } catch (LocalizedException $e) {
            // შეცდომის დამუშავება
            $this->logger->error('Failed to create CMS block: ' . $e->getMessage());
        }

        return $this;
    }
}
