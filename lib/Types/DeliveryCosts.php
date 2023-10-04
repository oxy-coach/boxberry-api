<?php

namespace Morfin60\BoxberryApi\Types;

/**
 * Class DeliveryCosts
 * @package Morfin60\BoxberryApi\Types
 */
class DeliveryCosts extends Base
{
    public $DeliveryCosts;

    public function __construct($object, $mapper)
    {
        $this->DeliveryCosts = $mapper->map($object->result->DeliveryCosts, "DeliveryCost");
    }
}
