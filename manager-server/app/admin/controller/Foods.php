<?php

namespace app\admin\controller;

use app\BaseController;
use Exception;
use think\facade\Db;

class Foods extends BaseController
{
    protected $user_table = 'user';

    public function index()
    {
        return $this->jsonResponse();
    }

    public function add()
    {
        try {
            $postData = input('post.');

            $data = [
                'username' => $this->request->param('username'),
                'password' => $this->request->param('password'),
                'nickname' => $this->request->param('nickname'),
                'sex' => $this->request->param('sex'),
                'create_time' =>  date('Y-m-d H:i:s'),
                'update_time' => date('Y-m-d H:i:s'),
                'status' => $this->request->param('status'),
                'avatar' => $this->request->param('avatar'),
            ];

            $id =  Db::table('user')->insert($data, true);
            $data['id'] = $id;
            return $this->jsonResponse($data);
        } catch (Exception $e) {
            return $this->jsonResponse(null, 500, $e->getMessage());
        }
    }

    public function delete()
    {
        $id = $this->request->param('id');
        Db::table('user')->where('id', $id)->delete();
        return $this->jsonResponse();
    }

    public function find()
    {
        try {
            $id = $this->request->param('id');
            $user = Db::table('')->where('id', $id)->find();
            return $this->jsonResponse($user);
        } catch (Exception $e) {
            return $this->jsonResponse(null, 500, $e->getMessage());
        }
    }

    public function edit()
    {
        try {
            $id = $this->request->param('id');
            $postData = input('post.');

            $data = [
                'username' => $this->request->param('username'),
                'password' => $this->request->param('password'),
                'nickname' => $this->request->param('nickname'),
                'sex' => $this->request->param('sex'),
                'update_time' => date('Y-m-d H:i:s'),
                'status' => $this->request->param('status'),
                'avatar' => $this->request->param('avatar'),
            ];

            Db::table('user')->where('id', $id)->update($data);
            return $this->jsonResponse();
        } catch (Exception $e) {
            return $this->jsonResponse(null, 500, $e->getMessage());
        }
    }

    public function list()
    {
        $list = Db::table('user')->select();
        return json($list);
    }
}
