<?php

namespace Morfin60\BoxberryApi\Types;

class City extends Base
{
    public $Name;
    public $Code;

    public function __construct($object)
    {
        parent::__construct($object);
    }
}