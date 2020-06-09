<?php

namespace zlyq\zlyqmodel\user;

class UserFollow
{
    private $userId;
    private $followMap;

    public function __construct($userId='', $followMap=[])
    {
        $this->userId = $userId;
        $this->followMap = $followMap;
    }

    public function __toArray()
    {
        return call_user_func('get_object_vars', $this);
    }

    public function add($k, $v)
    {
        $this->followMap[$k] = $v;
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
