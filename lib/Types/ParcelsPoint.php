<?php

namespace Morfin60\BoxberryApi\Types;

/**
 * Class ParcelsPoint
 * @package Morfin60\BoxberryApi\Types
 */
class ParcelsPoint extends Base
{
    /**
     * @access public
     * @var string
     */
    public $Code;

    /**
     * @access public
     * @var string
     */
    public $Name;

    /**
     * @access public
     * @var string
     */
    public $City;

    /**
     * ParcelsPoint constructor.
     * @param $object
     */
    public function __construct($object)
    {
        parent::__construct($object);
    }
}
