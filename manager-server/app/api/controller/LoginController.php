<?php

namespace app\api\controller;

use app\api\service\AuthService;
use app\BaseController;
use think\facade\Db;

/**
 * 登录控制器
 * 用户用户登录、注册、忘记密码、退出登录等功能
 * 包含第三方登录功能
 * 如微信、抖音、CSDN等
 */
class LoginController extends BaseController
{
    public function login()
    {
        $data = input('post.');
        $user = Db::table('user')->where('username', $data['username'])->find();
        if ($user) {
            if ($user['password'] == $data['password']) {
                return json(['code' => 200, 'msg' => '登录成功', 'data' => $user]);
            } else {
                return json(['code' => 201, 'msg' => '密码错误']);
            }
        } else {
            return json(['code' => 202, 'msg' => '用户不存在']);
        }
    }


    public function register() {

    }

    public function logout() {
        
    }

    public function check() {

    }


    public function wechat()
    {
        $authService = new AuthService();
        $provider = $authService->wechatLogin();
        $authorizationUrl = $provider->getAuthorizationUrl();
        
        // 将生成的 URL 重定向到微信授权页面
        header('Location: ' . $authorizationUrl);
        exit;
    }

    public function wechatCallback()
    {
        // 处理微信回调
        $authService = new AuthService();
        $provider = $authService->wechatLogin();
        $code = input('get.code');

        try {
            $token = $provider->getAccessToken('authorization_code', ['code' => $code]);
            // 使用 $token 获取用户信息
            return json(['success' => true, 'token' => $token]);
        } catch (\Exception $e) {
            return json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    // 类似处理抖音和 CSDN 登录
    
}
