<?php

namespace zlyq\zlyqmodel\video;

class VideoSyncInfos
{
    private $videos;

    public function __construct($videos=[])
    {
        $this->videos = $videos;
    }

    public function __toArray()
    {
        return call_user_func('get_object_vars', $this);
    }

    public function add($v)
    {
        array_push($this->videos, $v);
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
