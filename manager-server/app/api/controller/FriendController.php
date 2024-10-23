<?php

namespace app\api\controller;

use app\BaseController;
use think\facade\Db;

/**
 * 关系、档案、个人信息管理
 * 新增、修改、删除、查询
 */
class FriendController extends BaseController
{
    public function getParam($name, $default = '')
    {
        return $this->request->param($name, $default);
    }

    public function create()
    {
        $data = [
            'name' => $this->getParam('name'),
            'sex' => $this->getParam('sex'),
            'birth_date' => $this->getParam('birth_date'),
            'status' => $this->getParam('status'),
            'avatar' => $this->getParam('avatar'),
            'phone' => $this->getParam('phone'),
            'qq' => $this->getParam('qq'),
            'wechat' => $this->getParam('wechat'),
            'email' => $this->getParam('email'),
            'address' => $this->getParam('address'),
            'remark' => $this->getParam('remark'),
        ];
        $id =  Db::table('app_friend')->insert($data, true);
        $data['id'] = $id;
        return $this->jsonResponse($data);
    }

    public function delete()
    {
        $id = $this->request->param('id');
        Db::table('app_friend')->where('id', $id)->delete();
        return $this->jsonResponse();
    }

    public function query()
    {
        $id = $this->request->param('id');
        $data = Db::table('app_friend')->where('id', $id)->find();
        return $this->jsonResponse($data);
    }


    public function update()
    {
        $id = $this->request->param('id');
        $postData = input('post.');
        Db::table('app_friend')->where('id', $id)->update($postData);
        return $this->jsonResponse();
    }

    public function queryList()
    {
        $data = Db::table('app_friend')->select();
        return $this->jsonResponse($data);
    }
}
