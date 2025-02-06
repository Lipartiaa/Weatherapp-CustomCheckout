<?php
namespace Devall\SignupSheet\Block\Adminhtml\Signup;

use Magento\Backend\Block\Widget\Grid\Extended;
use Devall\SignupSheet\Model\ResourceModel\Signup\CollectionFactory;

class Grid extends Extended
{
    protected $collectionFactory;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    protected function _prepareCollection()
    {
        $collection = $this->collectionFactory->create();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn(
            'name',
            [
                'header' => __('Name'),
                'index'  => 'name',
                'type'   => 'text'
            ]
        );

        $this->addColumn(
            'date',
            [
                'header' => __('Date'),
                'index'  => 'date',
                'type'   => 'date'
            ]
        );

        return parent::_prepareColumns();
    }
}
