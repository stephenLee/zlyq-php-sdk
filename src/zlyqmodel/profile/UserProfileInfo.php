<?php

namespace zlyq\zlyqmodel\profile;

use zlyq\common\DebugMode;

class UserProfileInfo
{
    private $project_id;
    private $debug_mode;
    private $type;
    private $common;
    private $property;

    public function __construct($project_id=0, $debug_mode=DebugMode::NO_DEBUG_MODE, $type='user_profile', $common=NULL, $property=NULL)
    {
        $this->project_id = $project_id;
        $this->debug_mode = $debug_mode;
        $this->type = $type;
        $this->common = $common;
        $this->property = $property;
    }

    public function __toArray()
    {
        return [
            'project_id' => $this->project_id,
            'debug_mode' => $this->debug_mode,
            'type' => $this->type,
            'common' => $this->common->__toArray(),
            'property' => $this->property->__toArray(),
        ];
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

