<?php

namespace app\api\controller;

use app\BaseController;
use Exception;
use think\facade\Db;

class Food extends BaseController
{
    protected $user_table = 'user';


    public function create()
    {
        try {
            $postData = input('post.');

            $data = [
                'username' => $postData['username'],
                'password' => $postData['password'],
                'nickname' => $postData['nickname'],
                'sex' => $postData['sex'],
                'create_time' =>  date('Y-m-d H:i:s'),
                'update_time' => date('Y-m-d H:i:s'),
                'status' => $postData['status'],
                'avatar' => $postData['avatar'],
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

    public function query()
    {
        try {
            $id = $this->request->param('id');
            $user = Db::table('')->where('id', $id)->find();
            return $this->jsonResponse($user);
        } catch (Exception $e) {
            return $this->jsonResponse(null, 500, $e->getMessage());
        }
    }

    public function update()
    {
        try {
            $id = $this->request->param('id');
            $postData = input('post.');

            $data = [
                'username' => $postData['username'],
                'password' => $postData['password'],
                'nickname' => $postData['nickname'],
                'sex' => $postData['sex'],
                'update_time' => date('Y-m-d H:i:s'),
                'status' => $postData['status'],
                'avatar' => $postData['avatar'],
            ];

            Db::table('user')->where('id', $id)->update($data);
            return $this->jsonResponse();
        } catch (Exception $e) {
            return $this->jsonResponse(null, 500, $e->getMessage());
        }
    }

    public function queryList()
    {
        $list = Db::table('user')->select();
        return json($list);
    }
}
