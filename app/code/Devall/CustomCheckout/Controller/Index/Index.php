<?php
declare(strict_types=1);

namespace Devall\CustomCheckout\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Index extends Action
{
    /**
     * @param Context $context
     */
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    /**
     * Default execute method
     */
    public function execute()
    {
        // გვერდის შაბლონის დატვირთვა
        $this->_view->loadLayout();

        // შეგიძლიათ დაამატოთ დამატებითი ლოგიკა, მაგალითად მონაცემების გადაცემა ბლოკებს
        // $this->_view->getLayout()->getBlock('your_block_name')->setData('key', 'value');

        // შაბლონის გაშვება
        $this->_view->renderLayout();
    }
}
