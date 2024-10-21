<?php
namespace app\api\service;

use League\OAuth2\Client\Provider\GenericProvider;

class OAuthService
{
    protected $provider;

    public function __construct()
    {
        $config = config('oauth');
        
        $this->provider = new GenericProvider([
            'clientId'                => $config['client_id'],
            'clientSecret'            => $config['client_secret'],
            'redirectUri'             => $config['redirect_uri'],
            'urlAuthorize'            => $config['authorization_uri'],
            'urlAccessToken'          => $config['token_uri'],
            'urlResourceOwnerDetails' => '', // 如果需要获取用户信息
        ]);
    }

    public function getAuthorizationUrl()
    {
        return $this->provider->getAuthorizationUrl();
    }

    public function getAccessToken($code)
    {
        return $this->provider->getAccessToken('authorization_code', [
            'code' => $code,
        ]);
    }
}