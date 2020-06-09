<?php

namespace zlyq\zlyqmodel\article;

class ArticleSyncInfos
{
    private $articles;
    public function __construct($articles=NULL)
    {
        $this->articles = $articles;
    }

    public function add($a)
    {
        array_push($this->articles, $a);
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
