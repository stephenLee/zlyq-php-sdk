<?php

namespace zlyq\zlyqmodel\image;

class Image
{
    private $image;
    private $userId;
    private $description;
    private $source;
    private $thirdId;
    private $thirdExtra;

    public function __construct($image='', $userId='', $description='', $source=0, $thirdId='', $thirdExtra='')
    {
        $this->image = $image;
        $this->userId = $userId;
        $this->description = $description;
        $this->source = $source;
        $this->thirdId = $thirdId;
        $this->thirdExtra = $thirdExtra;
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
