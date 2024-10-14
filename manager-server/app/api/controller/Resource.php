<?php

namespace app\api\controller;

use app\BaseController;
use think\facade\Db;

class Resource extends BaseController
{

    public function create()
    {
        $postData = input('post.');

        $data = [
            'name' => $postData['name'],
            'sex' => $postData['sex'],
        ];

        Db::table('birth')->insert($data);
        return $this->jsonResponse();
    }

    public function delete()
    {
        $id = $this->request->param('id');
        Db::table('birth')->where('id', $id)->delete();
        return $this->jsonResponse();
    }

    public function query()
    {
        $id = $this->request->param('id');
        $data = Db::table('birth')->where('id', $id)->find();
        return $this->jsonResponse($data);
    }


    public function queryList() {
        $data = Db::table('birth')->select();
        return $this->jsonResponse($data);
    }

    public function update()
    {
        $id = $this->request->param('id');
        $postData = input('post.');

        $data = [
            'name' => '张三',
            'age' => 18,
        ];

        Db::table('birth')->where('id', $id)->update($data);

        return $this->jsonResponse($data);
    }
}
