<?php

namespace zlyq\zlyqmodel\track\priv;

class EventCommon
{
    private $event;
    private $event_time;
    private $is_first_day;
    private $is_first_time;
    private $is_login;

    public function __construct($event='', $event_time='', $is_first_day=0, $is_first_time=0, $is_login=0)
    {
        $this->event = $event;
        $this->event_time = $event_time;
        $this->is_first_day = $is_first_day;
        $this->is_first_time = $is_first_time;
        $this->is_login = $is_login;
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
