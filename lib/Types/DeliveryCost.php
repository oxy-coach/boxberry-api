<?php

namespace Morfin60\BoxberryApi\Types;

/**
 * Class DeliveryCost
 * @package Morfin60\BoxberryApi\Types
 */
class DeliveryCost extends Base
{
    public $PriceService;
    public $TotalPrice;
    public $PriceBase;
    public $DeliveryTypeId;
    public $DeliveryPeriod;

    /**
     * @param $object
     */
    public function __construct($object)
    {
        $this->PriceService = $object->PriceService;
        $this->TotalPrice = $object->TotalPrice;
        $this->PriceBase = $object->PriceBase;
        $this->DeliveryPeriod = $object->DeliveryPeriod;
        $this->DeliveryTypeId = $object->DeliveryTypeId;
    }
}
