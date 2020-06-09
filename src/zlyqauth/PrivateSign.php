<?php

namespace zlyq\zlyqauth;

class PrivateSign
{
    private $validTime;
    private $apiKey;
    private $signature;
    private $urlStr;

    public function __construct($apiKey, $signature='', $urlStr='', $validTime = 5 * 60 * 1000)
    {
        $this->validTime = $validTime;
        $this->apiKey = $apiKey;
        $this->signature = $signature;
        $this->urlStr = $urlStr;
    }

    public function buildString($params)
    {
        if (!$params) {
            return "";
        }
        ksort($params);
        $temp_params = [];
        foreach ($params as $k => $v) {
            $temp_params[] = $k . '=' . $v;
        }
        return implode('&', $temp_params);
    }

    public function buildSign($urlStr)
    {
        return md5($urlStr. '&' . $this->apiKey);
    }

    public function genSign($urlParams)
    {
        $this->urlStr = $this->buildString($urlParams);
        $this->signature = $this->buildSign($this->urlStr);
        return $this->signature;
    }

    public function checkSign($sign, $urlParams)
    {
        $t = 0;
        if ($urlParams) {
            if (array_key_exists('time', $urlParams)) {
                $t = intval($urlParams['time']);
            }
        }
        if (!$t) {
            return false;
        }

        if (intval(microtime(true) * 1000) - $t > $this->validTime) {
            return false;
        }

        $this->urlStr = $this->buildString($urlParams);
        $this->signature = $this->buildSign($this->urlStr);

        return strtolower($this->signature) == strtolower($sign);
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

