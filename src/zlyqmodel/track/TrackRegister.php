<?php

namespace zlyq\zlyqmodel\track;

class TrackRegister extends EventCommon
{
    private $methord;
    private $isSuccess;
    private $failReason;

    public function __construct($event = '', $eventTime = 0, $feedConfigId = '', $requestId = '', $abtestIds = '', $methord = 0, $isSuccess = 0, $failReason = '')
    {
        parent::__construct($event, $eventTime, $feedConfigId, $requestId, $abtestIds);

        $this->methord = $methord;
        $this->isSuccess = $isSuccess;
        $this->failReason = $failReason;
    }

    public function __toArray()
    {
        return call_user_func('get_object_vars', $this);
    }

    public function __get($property_name)
    {
        if (isset($this->$property_name)) {
            return ($this->$property_name);
        } else {
            return (NULL);
        }
    }

    public function __set($property_name, $value)
    {
        $this->$property_name = $value;
    }

    public function __isset($nm)
    {
        return isset($this->$nm);
    }

    public function __unset($nm)
    {
        unset($this->$nm);
    }
}
