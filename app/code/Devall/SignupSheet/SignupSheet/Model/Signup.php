<?php
namespace Devall\SignupSheet\Model;

use Magento\Framework\Model\AbstractModel;
use Devall\SignupSheet\Model\ResourceModel\Signup as SignupResource;

class Signup extends AbstractModel
{
    protected $_idFieldName = 'signup_id';
    protected $_model = 'Devall\SignupSheet\Model\ResourceModel\Signup';
}
