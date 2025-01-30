<?php

namespace Devall\Signup\Api;

interface SignupManagementInterface
{
    public function createSignup($name, $date);
    public function getAllSignups();
}
