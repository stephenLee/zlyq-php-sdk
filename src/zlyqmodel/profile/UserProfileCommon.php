<?php

namespace zlyq\zlyqmodel\profile;

class UserProfileCommon
{
    private $distinct_id;
    private $user_id;
    private $time;
    private $type;

    public function __construct($distinct_id='', $user_id='', $type='', $time=NULL)
    {
        $this->distinct_id = $distinct_id;
        $this->user_id = $user_id;
        $this->type = $type;
        $this->time = $time ? $time : date('Y-m-d H:i:s', time());
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
