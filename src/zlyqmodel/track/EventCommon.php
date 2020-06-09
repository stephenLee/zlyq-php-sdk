<?php

namespace zlyq\zlyqmodel\track;

class EventCommon
{
    private $event;
    private $eventTime;
    private $feedConfigId;
    private $requestId;
    private $abtestIds;

    public function __construct($event='', $eventTime=0, $feedConfigId='', $requestId='', $abtestIds='')
    {
        $this->event = $event;
        $this->eventTime = $eventTime;
        $this->feedConfigId = $feedConfigId;
        $this->requestId = $requestId;
        $this->abtestIds = $abtestIds;
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
