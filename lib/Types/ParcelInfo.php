<?php

namespace Morfin60\BoxberryApi\Types;

/**
 * Class ParcelInfo
 * @package Morfin60\BoxberryApi\Types
 */
class ParcelInfo extends Base
{
    public $orderId;
    public $trackNumber;
    public $declaredCost;
    public $paymentAmount;
    public $deliveryCost;
    public $deliveryType;
    public $courierDelivery;
    public $pickupPoint;
    public $recipientData;
    public $products;
    public $boxesData;
    public $issueType;

    /**
     * ParcelInfo constructor.
     * @param $object
     */
    public function __construct($object)
    {
        $this->orderId = (int) $object->order_id;
        $this->trackNumber = $object->track_number;
        $this->declaredCost = (float) $object->declared_cost;
        $this->paymentAmount = (float) $object->payment_amount;
        $this->deliveryCost = (float) $object->delivery_cost;
        $this->deliveryType = $object->delivery_type;
        $this->courierDelivery = !empty($object->courier_delivery) ? $object->courier_delivery : null;
        $this->pickupPoint = !empty($object->pickup_point) ? $object->pickup_point : null;
        $this->recipientData = $object->recipient_data;
        $this->products = !empty($object->products) ? $object->products : null;
        $this->boxesData = !empty($object->boxes_data) ? $object->boxes_data : null;
        $this->issueType = $object->issue_type;
    }
}
