<?php

use zlyq\common\Carrier;
use zlyq\common\DebugMode;
use zlyq\common\Network;
use zlyq\common\Os;
use zlyq\common\Platform;
use zlyq\common\SdkType;
use zlyq\zlyqmodel\track\priv\AppInstall;
use zlyq\zlyqmodel\track\priv\TrackCommon;
use zlyq\zlyqmodel\track\priv\TrackInfo;
use zlyq\zlyqsync\PrivateSyncClient;

require_once '../vendor/autoload.php';

$project_id = 1;
$api_key = "abcdefg";
$address = "http://47.93.23.69:8210";
$sync_client = new PrivateSyncClient($project_id, $api_key, $address, DebugMode::NO_DEBUG_MODE);

$track_common = new TrackCommon();
$track_common->udid = "abcd";
$track_common->user_id = "1234";
$track_common->distinct_id = "6039281029182710291";
$track_common->platform = Platform::IOS;
$track_common->sdk_type = SdkType::IOS;
$track_common->sdk_version = "1.0.1";
$track_common->screen_height = 650.0;
$track_common->screen_width = 350.0;
$track_common->manufacturer = "huawei";
$track_common->model = "huawei P40";
$track_common->network = Network::N_4G;
$track_common->os = Os::IOS;
$track_common->os_version = "12.1.1";
$track_common->carrier = Carrier::CHINA_MOBILE;
$track_common->app_version = "1.0.1";

$app_install = new AppInstall();
$properties = [$app_install];

$track_info = new TrackInfo();
$track_info->project_id = 2;
$track_info->common = $track_common;
$track_info->properties = $properties;

$res = $sync_client->track($track_info);
print_r($res);
