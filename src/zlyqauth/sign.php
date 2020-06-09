<?php

namespace zlyq\zlyqauth;

function addSign($urlParams, $appId, $appSecret)
{
    $urlParams['time'] = intval(microtime(true) * 1000);
    $urlParams['appId'] = $appId;
    ksort($urlParams);
    $temp_params = [];
    foreach ($urlParams as $k => $v) {
        $temp_params[] = $k . '=' . $v;
    }
    $param_str = implode('&', $temp_params);
    $signature = md5($appSecret . '&' . $param_str);
    return [$signature, $param_str];
}

function addAppToken($appKey, $appSecret)
{
    $timeStr = date('Y-m-d H:i', time());
    $ori_str = $appKey . $appSecret . $timeStr;
    return md5($ori_str);
}

function addPrivateSign($params, $apiKey)
{
    $params['time'] = intval(microtime(true) * 1000);
    ksort($params);
    $temp_params = [];
    foreach ($params as $k => $v) {
        $temp_params[] = $k . '=' . $v;
    }
    $param_str = implode('&', $temp_params);
    $signature = md5($apiKey . '&' . $param_str);
    return [$signature, $param_str];
}
