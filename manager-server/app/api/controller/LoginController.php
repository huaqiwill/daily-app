<?php

namespace app\api\controller;

use app\BaseController;
use think\facade\Db;

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

    
}
