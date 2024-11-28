<?php

namespace app\api\controller;

use app\BaseController;
use app\api\validate\UserValidate;
use Exception;
use think\facade\Db;

/**
 * 用户管理
 */
class UserController extends BaseController
{
    public function create()
    {
        try {
            validate(UserValidate::class)->check($this->request->post());

            $data = [
                'username' => $this->request->param('username'),
                'password' => $this->request->param('password'),
                'nickname' => $this->request->param('nickname'),
                'sex' => $this->request->param('sex'),
                'create_time' => date('Y-m-d H:i:s'),
                'update_time' => date('Y-m-d H:i:s'),
                'status' => $this->request->param('status'),
                'avatar' => $this->request->param('avatar'),
            ];

            $id = Db::table('sys_user')->insert($data, true);
            $data['id'] = $id;
            return $this->jsonResponse($data);
        } catch (Exception $e) {
            return $this->jsonResponse(null, 500, $e->getMessage());
        }
    }

    public function update()
    {
        try {
            validate(UserValidate::class)->check($this->request->post());

            $id = $this->request->param('id');

            $data = [
                'username' => $this->request->post('username'),
                'password' => $this->request->param('password'),
                'nickname' => $this->request->param('nickname'),
                'sex' => $this->request->param('sex'),
                'update_time' => date('Y-m-d H:i:s'),
                'status' => $this->request->param('status'),
                'avatar' => $this->request->param('avatar'),
            ];

            Db::table('sys_user')->where('id', $id)->update($data);
            return $this->jsonResponse();
        } catch (Exception $e) {
            return $this->jsonResponse(null, 500, $e->getMessage());
        }
    }

    public function delete()
    {
        try {
            $id = $this->request->param('id');
            Db::table('sys_user')->where('id', $id)->delete();
            return $this->jsonResponse();
        } catch (Exception $e) {
            return $this->jsonResponse(null, 500, $e->getMessage());
        }
    }

    public function query()
    {
        try {
            $id = $this->request->param('id');
            $user = Db::table('sys_user')->where('id', $id)->find();
            return $this->jsonResponse($user);
        } catch (Exception $e) {
            return $this->jsonResponse(null, 500, $e->getMessage());
        }
    }

    public function queryList()
    {
        try {
            $list = Db::table('sys_user')->select();
            return json($list);
        } catch (Exception $e) {
            return $this->jsonResponse(null, 500, $e->getMessage());
        }
    }
}
