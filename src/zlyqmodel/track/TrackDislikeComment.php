<?php

namespace zlyq\zlyqmodel\track;

class TrackDisLikeComment extends EventCommon
{
    private $contentId;
    private $contentType;
    private $commentId;

    public function __construct($event = '', $eventTime = 0, $feedConfigId = '', $requestId = '', $abtestIds = '', $contentId = 0, $contentType = 0, $commentId = 0)
    {
        parent::__construct($event, $eventTime, $feedConfigId, $requestId, $abtestIds);

        $this->contentId = $contentId;
        $this->contentType = $contentType;
        $this->commentId = $commentId;
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

