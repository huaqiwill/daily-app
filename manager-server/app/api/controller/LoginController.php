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
    /**
     * 用户登录
     *  用户输入用户名、密码登录
     *  用户输入手机号、密码登录
     *  用户输入邮箱、密码登录
     *  用户使用第三方账号登录
     * @return \think\response\Json
     */
    public function login()
    {
        $data = [
            'username' => input('post.username'),
            'password' => input('post.password'),
        ];
        // 判断用户名输入为邮箱
        if (filter_var($data['username'], FILTER_VALIDATE_EMAIL)) {
            $user = Db::table('user')->where('email', $data['username'])->find();
        }
        // 判断用户名输入为手机号
        else if (preg_match('/^1[3456789]\d{9}$/', $data['username'])) {
            $user = Db::table('user')->where('phone', $data['username'])->find();
        }
        // 输入的账号为普通用户
        else {
            $user = Db::table('user')->where('username', $data['username'])->find();
        }
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

    /**
     * 用户注册
     *  用户使用第三方账号登录后进行手机号注册
     *  用户使用手机号注册
     *  用户使用邮箱注册
     * @return \think\response\Json
     */
    public function register()
    {
        $data = [
            'username' => input('post.username'),
            'password' => input('post.password'),
            'phone' => input('post.phone'),
            'email' => input('post.email'),
        ];
        // 判断用户名是否已存在
        if (Db::table('user')->where('username', $data['username'])->find()) {
            return json(['code' => 201, 'msg' => '用户名已存在']);
        }
        // 判断手机号是否已存在
        if (Db::table('user')->where('phone', $data['phone'])->find()) {
            return json(['code' => 202, 'msg' => '手机号已存在']);
        }
        // 判断邮箱是否已存在
        if (Db::table('user')->where('email', $data['email'])->find()) {
            return json(['code' => 203, 'msg' => '邮箱已存在']);
        }
        // 注册用户
        Db::table('user')->insert($data);
        return json(['code' => 200, 'msg' => '注册成功']);
    }

    /**
     * 用户退出登录
     * @return void
     */
    public function logout()
    {
        // 清除用户登录状态
        session('user', null);
    }

    /**
     * 用户重置密码
     * @return void
     */
    public function resetPassword(){
        // 用户重置密码

    }

    public function check() {}


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
