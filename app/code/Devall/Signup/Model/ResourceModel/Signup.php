<?php

namespace Devall\Signup\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Signup extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('devall_signup', 'id'); // მაგენტო აბრუნებს თქვენს ცხრილში 'devall_signup'-ს
    }
}
