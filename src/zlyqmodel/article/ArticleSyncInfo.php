<?php

namespace zlyq\zlyqmodel\article;

class ArticleSyncInfo
{
    private $title;
    private $userId;
    private $content;
    private $h5content;
    private $os;
    private $deviceId;
    private $ip;
    private $longitude;
    private $latitude;
    private $source;
    private $thirdId;
    private $thirdExtra;
    private $createdAt;
    private $mediaType;

    public function __construct($title='', $userId='', $content='', $h5content='', $os=0, $deviceId='',
                                $ip='', $longitude=0, $latitude=0, $source=0, $thirdId='', $thirdExtra='',
                                $createdAt=0, $mediaType=2)
    {
        $this->title = $title;
        $this->userId = $userId;
        $this->content = $content;
        $this->h5content = $h5content;
        $this->os = $os;
        $this->deviceId = $deviceId;
        $this->ip = $ip;
        $this->longitude = $longitude;
        $this->latitude = $latitude;
        $this->source = $source;
        $this->thirdId = $thirdId;
        $this->thirdId = $thirdExtra;
        $this->createdAt = $createdAt;
        $this->mediaType = $mediaType;
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
