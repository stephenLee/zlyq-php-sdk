<?php
namespace zlyq\zlyqsync;
use zlyq\zlyqauth;
use GuzzleHttp\Client;

class PrivateSyncClient
{
    private $project_id;
    private $api_key;
    private $address;
    private $debug_mode;

    public function __construct($project_id, $api_key, $address, $debug_mode)
    {
        $this->project_id = $project_id;
        $this->api_key = $api_key;
        $this->address = $address;
        $this->debug_mode = $debug_mode;
    }

    public function buildHeader($params)
    {
        $header = [];
        $sign_op = new zlyqauth\PrivateSign($this->api_key);
        $sign = $sign_op->genSign($params);
        $header['Content-Type'] = 'application/json';
        $header['Z-Sign'] = $sign;
        return [$header, $sign_op->urlStr];
    }

    public function httpPost($address, $apiUrl, $params, $body)
    {
        $params = $params ? $params : [];
        list($header, $url_params) = $this->buildHeader($params);
        if ($url_params) {
            $url_str = $address . $apiUrl . '?' . $url_params;
        } else {
            $url_str = $address . $apiUrl;
        }
        $client = new Client(['base_uri' => $url_str]);
        $body = json_encode($body, true);
        $resp = $client->request('POST', $url_str, ['headers' => $header, 'body' => $body]);
        return $resp->getBody()->getContents();
    }
    public function userInfoSynchronize($userInfo)
    {
        $body = $userInfo->__toArray();
        return $this->httpPost($this->address, '/api/v1/synchronize/userInfo', [], $body);
    }

    public function userFollowSynchronize($userFollow)
    {
        $body = $userFollow->__toArray();
        return $this->httpPost($this->address, '/api/v1/synchronize/userFollow', [], $body);
    }

    public function track($trackInfo)
    {
        $trackInfo->project_id = $this->project_id;
        $trackInfo->debug_mode = $this->debug_mode;
        $body = $trackInfo->__toArray();
        return $this->httpPost($this->address, '/api/v1/track/' . $this->project_id, [], $body);
    }

    public function setUserProfile($userProfileInfo)
    {
        $userProfileInfo->project_id = $this->project_id;
        $userProfileInfo->debug_mode = $this->debug_mode;
        $userProfileInfo->common->type = "set";
        $body = $userProfileInfo->__toArray();
        return $this->httpPost($this->address, '/api/v1/user_profile/' . $this->project_id, [], $body);
    }

    public function setUserProfileOnce($userProfileInfo)
    {
        $userProfileInfo->project_id = $this->project_id;
        $userProfileInfo->debug_mode = $this->debug_mode;
        $userProfileInfo->common->type = "set_once";
        $body = $userProfileInfo->__toArray();
        return $this->httpPost($this->address, '/api/v1/user_profile/' . $this->project_id, [], $body);
    }

    public function appendUserProfile($userProfileInfo)
    {
        $userProfileInfo->project_id = $this->project_id;
        $userProfileInfo->debug_mode = $this->debug_mode;
        $userProfileInfo->common->type = "append";
        $body = $userProfileInfo->__toArray();
        return $this->httpPost($this->address, '/api/v1/user_profile/' . $this->project_id, [], $body);
    }

    public function increaseUserProfile($userProfileInfo)
    {
        $userProfileInfo->project_id = $this->project_id;
        $userProfileInfo->debug_mode = $this->debug_mode;
        $userProfileInfo->common->type = "increase";
        $body = $userProfileInfo->__toArray();
        return $this->httpPost($this->address, '/api/v1/user_profile/' . $this->project_id, [], $body);
    }

    public function deleteUserProfile($userProfileInfo)
    {
        $userProfileInfo->project_id = $this->project_id;
        $userProfileInfo->debug_mode = $this->debug_mode;
        $userProfileInfo->common->type = "delete";
        $body = $userProfileInfo->__toArray();
        return $this->httpPost($this->address, '/api/v1/user_profile/' . $this->project_id, [], $body);
    }

    public function unsetUserProfile($userProfileInfo)
    {
        $userProfileInfo->project_id = $this->project_id;
        $userProfileInfo->debug_mode = $this->debug_mode;
        $userProfileInfo->common->type = "unset";
        $body = $userProfileInfo->__toArray();
        return $this->httpPost($this->address, '/api/v1/user_profile/' . $this->project_id, [], $body);
    }
}

