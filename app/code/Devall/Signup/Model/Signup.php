<?php

namespace Devall\Signup\Model;

use Magento\Framework\Model\AbstractModel;
use Devall\Signup\Model\ResourceModel\Signup as SignupResource;

class Signup extends AbstractModel
{
    protected $_idFieldName = 'id';
    protected $_name = 'name';
    protected $_date = 'date';

    protected $_resourceModel = SignupResource::class;

    protected function _construct()
    {
        $this->_init(SignupResource::class);
    }
}
