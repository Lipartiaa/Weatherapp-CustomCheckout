<?php

namespace Devall\Signup\Block;

use Magento\Framework\View\Element\Template;
use Devall\Signup\Helper\Data;

class SignupForm extends Template
{
    protected $helper;

    public function __construct(
        Template\Context $context,
        Data $helper,
        array $data = []
    ) {
        $this->helper = $helper;
        parent::__construct($context, $data);
    }

    public function getHelper()
    {
        return $this->helper;
    }
}
