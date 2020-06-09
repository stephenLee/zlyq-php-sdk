<?php

namespace zlyq\zlyqmodel\video;

class VideoSyncInfo
{
    private $title;
    private $userId;
    private $content;
    private $uploadType;
    private $orgFileName;
    private $os;
    private $deviceId;
    private $ip;
    private $longitude;
    private $latitude;
    private $audioId;
    private $source;
    private $thirdId;
    private $thirdExtra;
    private $createdAt;

    public function __construct($title='', $userId='', $content='', $uploadType='', $orgFileName='', $os=0,
                                $deviceId='', $ip='', $longitude=0, $latitude=0, $audioid=0, $source=0,
                                $thirdId='', $thirdExtra='', $createdAt=0)
    {
        $this->title = $title;
        $this->userId = $userId;
        $this->content = $content;
        $this->uploadType = $uploadType;
        $this->orgFileName = $orgFileName;
        $this->os = $os;
        $this->deviceId = $deviceId;
        $this->ip = $ip;
        $this->longitude = $longitude;
        $this->latitude = $latitude;
        $this->audioId = $audioid;
        $this->source = $source;
        $this->thirdId = $thirdId;
        $this->thirdExtra = $thirdExtra;
        $this->createdAt = $createdAt;
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
