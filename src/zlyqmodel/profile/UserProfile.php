<?php

namespace zlyq\zlyqmodel\profile;

class UserProfile
{
    private $user_id;
    private $distinct_id;
    private $udid;
    private $birthday;
    private $name;
    private $gender;
    private $browser;
    private $browser_version;
    private $first_visit_time;
    private $utm_source;
    private $utm_media;
    private $utm_campaign;
    private $utm_content;
    private $utm_term;
    private $os;
    private $os_version;
    private $sdk_type;
    private $sdk_version;
    private $app_version;
    private $update_time;

    public function __construct($user_id='', $distinct_id='', $udid='', $birthday='', $name='', $gender='', $browser='', $browser_version='',
                                $first_visit_time='', $utm_source='', $utm_media='', $utm_campaign='', $utm_content='', $utm_term='', $os='',
                                $os_version='', $sdk_type='', $sdk_version='', $app_version='', $update_time=NULL)
    {
        $this->user_id = $user_id;
        $this->distinct_id = $distinct_id;
        $this->udid = $udid;
        $this->birthday = $birthday;
        $this->name = $name;
        $this->gender = $gender;
        $this->browser = $browser;
        $this->browser_version =$browser_version;
        $this->first_visit_time = $first_visit_time;
        $this->utm_source = $utm_source;
        $this->utm_media = $utm_media;
        $this->utm_campaign = $utm_campaign;
        $this->utm_content = $utm_content;
        $this->utm_term = $utm_term;
        $this->os = $os;
        $this->os_version = $os_version;
        $this->sdk_type = $sdk_type;
        $this->sdk_version = $sdk_version;
        $this->app_version = $app_version;
        $this->update_time = $update_time ? $update_time : date('Y-m-d H:i:s');
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
