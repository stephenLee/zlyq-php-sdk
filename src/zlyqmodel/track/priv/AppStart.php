<?php

namespace zlyq\zlyqmodel\track\priv;

class AppStart extends EventCommon
{
    private $event;
    private $event_time;

    public function __construct($event = 'appStart', $event_time = '', $is_first_day = 0, $is_first_time = 0, $is_login = 0)
    {
        parent::__construct($event, $event_time, $is_first_day, $is_first_time, $is_login);
        $this->event = $event;
        $this->event_time = $event_time ? $event_time : date('Y-m-d H:i:s', time());
    }

    public function __toArray()
    {
        return call_user_func('get_object_vars', $this);
    }
}

