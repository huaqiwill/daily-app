<?php

namespace app\api\service;

use League\OAuth2\Client\Provider\GenericProvider;

class AuthService
{
    protected $provider;

    public function wechatLogin()
    {
        // 微信登录逻辑
        $provider = new GenericProvider([
            'clientId'                => env('WECHAT_APP_ID'),
            'clientSecret'            => env('WECHAT_APP_SECRET'),
            'redirectUri'             => '你的重定向URI',
            'urlAuthorize'            => 'https://open.weixin.qq.com/connect/oauth2/authorize',
            'urlAccessToken'          => 'https://api.weixin.qq.com/sns/oauth2/access_token',
        ]);

        return $provider;
    }

    public function douyinLogin()
    {
        // 抖音登录逻辑
        $provider = new GenericProvider([
            'clientId'                => env('DOUYIN_APP_ID'),
            'clientSecret'            => env('DOUYIN_APP_SECRET'),
            'redirectUri'             => '你的重定向URI',
            'urlAuthorize'            => 'https://open.douyin.com/platform/oauth/connect',
            'urlAccessToken'          => 'https://open.douyin.com/oauth/access_token',
        ]);

        return $provider;
    }

    public function csdnLogin()
    {
        // CSDN登录逻辑
        $provider = new GenericProvider([
            'clientId'                => env('CSDN_CLIENT_ID'),
            'clientSecret'            => env('CSDN_CLIENT_SECRET'),
            'redirectUri'             => '你的重定向URI',
            'urlAuthorize'            => 'https://oauth.csdn.net/oauth2/authorize',
            'urlAccessToken'          => 'https://oauth.csdn.net/oauth2/access_token',
        ]);

        return $provider;
    }
}
