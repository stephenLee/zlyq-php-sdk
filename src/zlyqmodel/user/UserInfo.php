<?php

namespace zlyq\zlyqmodel\user;

class UserInfo
{
    private $thirdId;
    private $account;
    private $nickname;
    private $avatar;
    private $gender;
    private $birthday;
    private $signature;
    private $region;
    private $extraInfo;
    private $createdAt;
    private $updatedAt;
    private $loginTime;
    private $isRobot;
    private $status;
    private $avatarStorage;
    private $phone;
    private $deviceId;
    private $deviceType;

    public function __construct($thirdId='', $account='', $nickname='', $avatar='', $gender=0, $birthday=0, $signature='',
                                $region='', $extraInfo='', $createdAt=0, $updatedAt=0, $loginTime=0, $isRobot=0, $status=0,
                                $avatarStorage=false, $phone='', $deviceId='', $deviceType='')
    {
        $this->thirdId = $thirdId;
        $this->account = $account;
        $this->nickname = $nickname;
        $this->avatar = $avatar;
        $this->gender = $gender;
        $this->birthday = $birthday;
        $this->signature = $signature;
        $this->region = $region;
        $this->extraInfo = $extraInfo;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->loginTime = $loginTime;
        $this->isRobot = $isRobot;
        $this->status = $status;
        $this->avatarStorage = $avatarStorage;
        $this->phone = $phone;
        $this->deviceId = $deviceId;
        $this->deviceType = $deviceType;
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
