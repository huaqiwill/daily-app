<?php

namespace app\controller;

use app\BaseController;
use think\facade\Db;

class Friends extends BaseController
{
    public function add()
    {
        $postData = input('post.');
        $data = [
            'name' => $this->request->param('name'),
            'age' => 18,
        ];
        Db::table('friends')->insert($data);
    }

    public function delete()
    {
        $id = input('id');
        Db::table('friends')->delete(['id' => $id]);
    }

    public function find()
    {
        $data = Db::table('')->find();
        return json($data);
    }

    public function edit() {
        $postData = input('post.');
        Db::table('friends')->update($postData);
    }

    public function list()
    {
        $data = Db::table('')->select();
        return json($data);
    }
}
