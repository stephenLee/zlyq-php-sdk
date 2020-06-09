<?php

namespace zlyq\zlyqmodel\media;

class MediaFavorites
{
    private $mediaFavorites;

    public function __construct($mediaFavorites=[])
    {
        $this->mediaFavorites = $mediaFavorites;
    }
    public function add($m)
    {
        array_push($this->mediaFavorites, $m);
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
