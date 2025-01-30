<?php

namespace Devall\Signup\Block\Adminhtml\Signup;

use Magento\Backend\Block\Widget\Grid\Extended;
use Magento\Backend\Helper\Data;
use Devall\Signup\Model\ResourceModel\Signup\CollectionFactory;

class Grid extends Extended
{
    protected $_collectionFactory;
    protected $_backendHelper;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        CollectionFactory $collectionFactory,
        Data $backendHelper,
                                                $data = []
    ) {
        $this->_collectionFactory = $collectionFactory;
        $this->_backendHelper = $backendHelper;
        parent::__construct($context, $data);
    }

    protected function _prepareCollection()
    {
        $collection = $this->_collectionFactory->create();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn(
            'id',
            [
                'header' => __('ID'),
                'index' => 'id',
                'type' => 'number',
                'width' => '50px',
            ]
        );

        $this->addColumn(
            'name',
            [
                'header' => __('Name'),
                'index' => 'name',
                'type' => 'text',
            ]
        );

        $this->addColumn(
            'date',
            [
                'header' => __('Date'),
                'index' => 'date',
                'type' => 'date',
            ]
        );

        return parent::_prepareColumns();
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', ['_current' => true]);
    }
}
