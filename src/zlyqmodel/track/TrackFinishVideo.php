<?php

namespace zlyq\zlyqmodel\track;

class TrackFinishVideo extends EventCommon
{
    private $methord;
    private $contentId;
    private $contentType;
    private $videoTime;
    private $duration;
    private $isFinish;

    public function __construct($event = '', $eventTime = 0, $feedConfigId = '', $requestId = '', $abtestIds = '', $methord = 0, $contentId = 0, $contentType = 0, $videoTime = 0, $duration = 0, $isFinish = 0)
    {
        parent::__construct($event, $eventTime, $feedConfigId, $requestId, $abtestIds);
        $this->methord = $methord;
        $this->contentId = $contentId;
        $this->contentType = $contentType;
        $this->videoTime = $videoTime;
        $this->duration = $duration;
        $this->isFinish = $isFinish;
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


