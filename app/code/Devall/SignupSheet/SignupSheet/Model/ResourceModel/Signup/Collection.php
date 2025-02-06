<?php
namespace Devall\SignupSheet\Model\ResourceModel\Signup;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Devall\SignupSheet\Model\Signup as SignupModel;
use Devall\SignupSheet\Model\ResourceModel\Signup as SignupResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'signup_id';
    protected $_model = SignupModel::class;
    protected $_resourceModel = SignupResource::class;
}
