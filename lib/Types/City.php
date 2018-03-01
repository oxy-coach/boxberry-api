<?php

namespace Morfin60\BoxberryApi\Types;

/**
 * Class City
 * @package Morfin60\BoxberryApi\Types
 */
class City extends Base
{
    public $Name;
    public $Code;

    /**
     * City constructor.
     * @param $object
     */
    public function __construct($object)
    {
        parent::__construct($object);
    }
}
