<?php
namespace Devall\SignupSheet\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Signup extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('devall_signup_sheet', 'signup_id');
    }
}
