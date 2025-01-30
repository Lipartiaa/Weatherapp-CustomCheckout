<?php

namespace Devall\Signup\Model;

use Devall\Signup\Api\SignupManagementInterface;
use Devall\Signup\Model\SignupFactory;
use Devall\Signup\Model\ResourceModel\Signup\CollectionFactory;

class SignupManagement implements SignupManagementInterface
{
    protected $signupFactory;
    protected $collectionFactory;

    public function __construct(
        SignupFactory $signupFactory,
        CollectionFactory $collectionFactory
    ) {
        $this->signupFactory = $signupFactory;
        $this->collectionFactory = $collectionFactory;
    }

    public function createSignup($name, $date)
    {
        $signup = $this->signupFactory->create();
        $signup->setName($name);
        $signup->setDate($date);
        $signup->save();
        return $signup;
    }

    public function getAllSignups()
    {
        $collection = $this->collectionFactory->create();
        return $collection->getItems();
    }
}
