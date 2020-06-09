<?php

namespace zlyq\zlyqmodel\track\priv;

class TrackCommon
{
    private $udid;
    private $user_id;
    private $distinct_id;
    private $app_id;
    private $platform;
    private $time;
    private $sdk_type;
    private $sdk_version;
    private $screen_height;
    private $screen_width;
    private $manufacturer;
    private $model;
    private $network;
    private $os;
    private $os_version;
    private $carrier;
    private $app_version;

    public function __construct($udid = '', $user_id=0, $distinct_id=0, $app_id=0, $platform='', $time=0,
                                $sdk_type='', $sdk_version='', $screen_height=0, $screen_width=0, $manufacturer='',
                                $model='', $network='', $os='', $os_version='', $carrier='', $app_version='')
    {
        $this->udid = $udid;
        $this->user_id = $user_id;
        $this->distinct_id = $distinct_id;
        $this->app_id = $app_id;
        $this->platform = $platform;
        $this->time = $time;
        $this->sdk_type = $sdk_type;
        $this->sdk_version = $sdk_version;
        $this->screen_height = $screen_height;
        $this->screen_width = $screen_width;
        $this->manufacturer = $manufacturer;
        $this->model = $model;
        $this->network  = $network;
        $this->os = $os;
        $this->os_version = $os_version;
        $this->carrier = $carrier;
        $this->app_version = $app_version;
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


