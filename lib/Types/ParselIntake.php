<?php

namespace Morfin60\BoxberryApi\Types;

class ParselIntake extends Base
{
    /* @var string */
    public $Message;

    public function __construct($object, $mapper = null)
    {
        parent::__construct($object);

        $this->Message = isset($object->message) ? $object->message : null;
    }
}
