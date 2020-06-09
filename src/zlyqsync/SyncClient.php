<?php

namespace zlyq\zlyqsync;
use zlyq\zlyqauth;
use GuzzleHttp\Client;

class SyncClient
{
    private $appKey;
    private $appSecret;
    private $appId;
    private $address;

    public function buildHeader($params)
    {
        $header = [];
        list($sign, $url_params) = zlyqauth\addSign($params, $this->appId, $this->appSecret);
        $app_token = zlyqauth\addAppToken($this->appKey, $this->appSecret);
        $header['Content-Type'] = 'application/json';
        $header['X-Sign'] = $sign;
        $header['X-App-Token'] = $app_token;

        return [$header, $url_params];
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
        $resp = $client->request('POST', $url_str, ['headers' => $header, 'json' => ['body' => $body]]);
        return $resp->getBody();
    }

    public function httpMultiForm($address, $apiUrl, $params, $body)
    {
        $params = $params ? $params : [];
        list($header, $url_params) = $this->buildHeader($params);
        $url_str = $address . $apiUrl . '?' . $url_params;
        $client = new Client(['base_uri' => $url_str]);

        $files = $body;
        $form  = $body;
        $multipart = [];
        foreach ($files as $name => $path) {
            $multipart[] = [
                'name' => $name,
                'contents' => fopen($path, 'r'),
            ];
        }
        foreach ($form as $name => $contents) {
            $multipart[] = compact('name', 'contents');
        }

        $client->request('POST', $url_str, ['multipart' => $multipart, 'connect_timeout' => 30, 'timeout' => 30, 'read_timeout' => 30, 'headers' => $header]);
    }

    public function userInfoSynchronize($userInfo)
    {
        $body = (array) $userInfo;
        return $this->httpPost($this->address, '/api/v1/synchronize/userInfo', [], $body);
    }

    public function userFollowSynchronize($userFollow)
    {
        $body = (array) $userFollow;
        return $this->httpPost($this->address, '/api/v1/synchronize/userFollow', [], $body);
    }

    public function track($trackInfo)
    {
        $body = (array) $trackInfo;
        return $this->httpPost($this->address, '/trace', [], $body);
    }

    public function videoUpload($video)
    {
        $body = [
            "image" => ['imageFile', $video->image, 'application/octet-stream'],
            "video" => ['videoFile', $video->video, 'application/octet-stream'],
            "title" => $video->title,
            "userId" => $video->userId,
            "content" => $video->content,
            "orgFileName" => $video->orgFileName,
            "os" => $video->os,
            "source" => $video->source,
            "thirdId" => $video->thirdId,
            "thirdExtra" => $video->thirdExtra,
        ];
    }

    public function videoSynchronize($video)
    {
        $body = (array) $video;
        return $this->httpPost($this->address, '/api/v1/videoSync', [], $body);
    }

    public function imageUpload($image)
    {
        $body = [
            'image' => ['file' => $image->image, 'application/octet-stream'],
            'description' => $image->description,
            'userId' => $image->userId,
            'source' => $image->source,
            'thirdId' => $image->thirdId,
            'thirdExtra' => $image->thirdExtra,
        ];
    }

    public function articleSynchronize($article)
    {
        $body = (array) $article;
        return $this->httpPost($this->address, '/api/v1/articleSync', [], $body);
    }

    public function articleUpload($article)
    {
        $body = (array) $article;
        return $this->httpPost($this->address, '/api/v1/articleUploadSync', [], $body);
    }

    public function mediaLikeSynchronize($mls)
    {
        $body = (array) $mls;
        return $this->httpPost($this->address, '/api/v1/mediaLikeSync', [], $body);
    }

    public function mediaFavoriteSynchronize($mfs)
    {
        $body = (array) $mfs;
        return $this->httpPost($this->address, '/api/v1/mediaFavoriteSync', [], $body);
    }

    public function commentSynchronize($comments)
    {
        $body = (array) $comments;
        return $this->httpPost($this->address, '/api/v1/commentSync', [], $body);
    }

    public function commentLikeSynchronize($cls)
    {
        $body = (array) $cls;
        return $this->httpPost($this->address, '/api/v1/commentLikeSync', [], $body);
    }
}
