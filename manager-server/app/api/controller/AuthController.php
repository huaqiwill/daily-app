<?php

namespace app\api\controller;

use app\api\service\OAuthService;

/**
 * 授权管理
 * 允许被作用于第三方登录
 */
class AuthController
{
    public function login()
    {
        $oauthService = new OAuthService();
        $authorizationUrl = $oauthService->getAuthorizationUrl();
        header('Location: ' . $authorizationUrl);
        exit;
    }

    public function callback()
    {
        $oauthService = new OAuthService();
        $code = input('get.code');

        try {
            $token = $oauthService->getAccessToken($code);
            // 使用 $token 获取用户信息等
            return json(['success' => true, 'token' => $token]);
        } catch (\Exception $e) {
            return json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
