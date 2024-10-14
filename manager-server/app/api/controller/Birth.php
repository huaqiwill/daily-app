<?php

namespace app\api\controller;

use app\BaseController;
use think\facade\Db;

class Birth extends BaseController
{
    // 新增
    public function create()
    {
        $postData = input('post.');

        $data = [
            'name' => $postData['name'],
            'sex' => $postData['sex'],
            'birth_date' => $postData['birth_date'],
            'birth_type' => $postData['birth_type'],
            'phone' => $postData['phone'],
            'email' => $postData['emai'],
            'wechat' => $postData['wechat'],
            'qq' => $postData['qq'],
        ];

        Db::table('app_birth')->insert($data);
        return $this->jsonResponse($data);
    }

    // 删除
    public function delete()
    {
        $id = $this->request->param('id');
        Db::table('app_birth')->where('id', $id)->delete();
        return $this->jsonResponse();
    }

    // 修改
    public function update()
    {
        $id = $this->request->param('id');
        $postData = input('post.');

        $data = [
            'name' => $postData['name'],
            'sex' => $postData['sex'],
            'birth_date' => $postData['birth_date'],
            'birth_type' => $postData['birth_type'],
            'phone' => $postData['phone'],
            'email' => $postData['emai'],
            'wechat' => $postData['wechat'],
            'qq' => $postData['qq'],
        ];

        Db::table('app_birth')->where('id', $id)->update($data);

        return $this->jsonResponse($data);
    }

    // 查询
    public function query()
    {
        $id = $this->request->param('id');
        $data = Db::table('app_birth')->where('id', $id)->find();
        return $this->jsonResponse($data);
    }


    // 获取所有
    public function queryList()
    {
        $data = Db::table('app_birth')->select();
        return $this->jsonResponse($data);
    }
}
