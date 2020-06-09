<?php

namespace zlyq\zlyqmodel\track\priv;

class AppEnd extends EventCommon
{
    private $event;
    private $event_time;
    private $duration;

    public function __construct($event = 'appEnd', $event_time = '', $is_first_day = 0, $is_first_time = 0, $is_login = 0, $duration = 0)
    {
        parent::__construct($event, $event_time, $is_first_day, $is_first_time, $is_login);
        $this->event = $event;
        $this->event_time = $event_time ? $event_time : date('Y-m-d H:i:s', time());
        $this->duration = $duration;
    }

    public function __toArray()
    {
        return call_user_func('get_object_vars', $this);
    }
}
