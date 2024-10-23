<?php

namespace app\controller;

use app\BaseController;
use think\facade\Db;

class Birth extends BaseController
{

    public function add()
    {
        $postData = input('post.');

        $data = [
            'name' => $this->request->param('name'),
            'sex' => $this->request->param('sex'),
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

    public function find()
    {
        $id = $this->request->param('id');
        $data = Db::table('birth')->where('id', $id)->find();
        return $this->jsonResponse($data);
    }

    public function edit()
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
