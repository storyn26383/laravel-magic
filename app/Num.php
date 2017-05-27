<?php

namespace App;

class Num
{
    protected $version;

    public function __construct($version)
    {
        $this->version = $version;
    }

    public function version()
    {
        return $this->version;
    }

    public function pi()
    {
        return 3.14159265359;
    }
}
