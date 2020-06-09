<?php

namespace zlyq\zlyqmodel\track\priv;
use zlyq\common\DebugMode;

class TrackInfo
{
    private $project_id;
    private $debug_mode;
    private $type;
    private $common;
    private $properties;

    public function __construct($project_id=0, $debug_mode=DebugMode::NO_DEBUG_MODE, $type='track', $common = NULL, $properties = [])
    {
        $this->project_id = $project_id;
        $this->debug_mode = $debug_mode;
        $this->type = $type;
        $this->common = $common;
        $this->properties = $properties;
    }

    public function __toArray()
    {
        $properties = [];
        foreach ($this->properties as $k => $v) {
            $properties[] = $v->__toArray();
        }
        return [
            'project_id' => $this->project_id,
            'debug_mode' => $this->debug_mode,
            'type' => $this->type,
            'common' => $this->common->__toArray(),
            'properties' => $properties,
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

