<?php

namespace Devall\Signup\Model;

class Data
{
    private $name;
    private $date;

    public function __construct($name, $date)
    {
        $this->name = $name;
        $this->date = $date;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDate()
    {
        return $this->date;
    }
}
