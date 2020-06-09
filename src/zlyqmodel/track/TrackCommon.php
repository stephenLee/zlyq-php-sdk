<?php

namespace zlyq\zlyqmodel\track;

class TrackCommon
{
    private $udid;
    private $userId;
    private $distinctId;
    private $appId;
    private $platform;
    private $time;
    private $iosSdkVersions;
    private $androidSdkVersions;
    private $screenHeight;
    private $screenWidth;
    private $manufacturer;
    private $network;
    private $os;
    private $osVersion;
    private $ip;
    private $country;
    private $province;
    private $city;
    private $carrier;
    private $utmSource;
    private $utmMedia;
    private $utmCampaign;
    private $utmContent;
    private $utmTerm;
    private $appVersion;

    public function __construct($udid = '', $userId=0, $distinctId=0, $appId=0, $platform='', $time=0, $iosSdkVersions='', $androidSdkVersions='',
                                $screenHeight=0, $screenWidth=0, $manufacturer='', $network=0, $os=0, $osVersion='', $ip='', $country='',
                                $province='', $city='', $carrier='', $utmSource='', $utmMedia='', $utmCampaign='', $utmContent='', $utmTerm='', $appVersion='')
    {
        $this->udid = $udid;
        $this->userId = $userId;
        $this->distinctId = $distinctId;
        $this->appId = $appId;
        $this->platform = $platform;
        $this->time = $time;
        $this->iosSdkVersions = $iosSdkVersions;
        $this->androidSdkVersions = $androidSdkVersions;
        $this->screenHeight = $screenHeight;
        $this->screenWidth = $screenWidth;
        $this->manufacturer = $manufacturer;
        $this->network  = $network;
        $this->os = $os;
        $this->osVersion = $osVersion;
        $this->ip = $ip;
        $this->country = $country;
        $this->province = $province;
        $this->city = $city;
        $this->carrier = $carrier;
        $this->utmSource = $utmSource;
        $this->utmMedia = $utmMedia;
        $this->utmCampaign = $utmCampaign;
        $this->utmContent = $utmContent;
        $this->utmTerm = $utmTerm;
        $this->appVersion = $appVersion;
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
