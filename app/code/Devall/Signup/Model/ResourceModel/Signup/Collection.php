<?php

namespace Devall\Signup\Model\ResourceModel\Signup;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Devall\Signup\Model\Signup;
use Devall\Signup\Model\ResourceModel\Signup as SignupResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';  // თქვენი მთავარი ველი (Primary Key)
    protected $_model = Signup::class;
    protected $_resourceModel = SignupResource::class;

    protected function _construct()
    {
        $this->_init(
            \Devall\Signup\Model\Signup::class, // მოდელი
            \Devall\Signup\Model\ResourceModel\Signup::class // რესურსმოდელი
        );
    }
}
