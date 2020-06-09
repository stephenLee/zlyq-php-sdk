<?php

namespace zlyq\zlyqmodel\media;

class CommentLike
{
    private $mediaId;
    private $userId;
    private $createdAt;
    private $commentId;

    public function __construct($mediaId='', $userId='', $createdAt=0, $commentId='')
    {
        $this->mediaId = $mediaId;
        $this->userId = $userId;
        $this->createdAt = $createdAt;
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
