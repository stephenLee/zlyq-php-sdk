<?php

namespace zlyq\zlyqmodel\media;

class MediaFavorite
{
    private $mediaId;
    private $userId;
    private $createdAt;

    public function __construct($mediaId='', $userId='', $createdAt=0)
    {
        $this->mediaId = $mediaId;
        $this->userId = $userId;
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
