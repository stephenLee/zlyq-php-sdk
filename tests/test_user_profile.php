<?php

use zlyq\common\SdkType;
use zlyq\common\DebugMode;
use zlyq\common\Os;
use zlyq\zlyqmodel\profile\UserProfile;
use zlyq\zlyqmodel\profile\UserProfileCommon;
use zlyq\zlyqmodel\profile\UserProfileInfo;
use zlyq\zlyqsync\PrivateSyncClient;

require_once '../vendor/autoload.php';

$project_id = 1;
$api_key = "abcdefg";
$address = "http://47.93.23.69:8210";
$sync_client = new PrivateSyncClient($project_id, $api_key, $address, DebugMode::NO_DEBUG_MODE);

$user_profile = new UserProfile();
$user_profile->user_id = "123";
$user_profile->distinct_id = "6020103928102918274";
$user_profile->udid = "abcdefg";
$user_profile->birthday = "1990-01-01 20:00:00";
$user_profile->name = "小脑斧";
$user_profile->gender = "男";
$user_profile->browser = "chrome";
$user_profile->browser_version = "1.0.0";
$user_profile->first_visit_time = "2020-02-02 20:00:00";
$user_profile->utm_source = "toutiao";
$user_profile->utm_media = "cpc";
$user_profile->utm_campaign = "app";
$user_profile->utm_content = "20200101";
$user_profile->utm_term = "delicacy";
$user_profile->os = Os::IOS;
$user_profile->os_version = "10.0.1";
$user_profile->sdk_type = SdkType::IOS;
$user_profile->sdk_version = "1.0.1";
$user_profile->app_version = "2.0.0";


$user_profile_common = new UserProfileCommon();
$user_profile_common->distinct_id = "6039281029182710291";
$user_profile_common->user_id = "123";
$user_profile_common->type = "1234";


$user_profile_info = new UserProfileInfo();
$user_profile_info->common = $user_profile_common;
$user_profile_info->property = $user_profile;

$res = $sync_client->setUserProfile($user_profile_info);
print_r($res);
