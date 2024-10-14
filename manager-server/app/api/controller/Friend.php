<?php

namespace app\api\controller;

use app\BaseController;
use think\facade\Db;

class Friend extends BaseController
{
    public function create()
    {
        $postData = input('post.');
        $data = [
            'name' => $postData['name'],
            'age' => 18,
        ];
        Db::table('friends')->insert($data);
    }

    public function delete()
    {
        $id = input('id');
        Db::table('friends')->delete(['id' => $id]);
    }

    public function query()
    {
        $data = Db::table('')->find();
        return json($data);
    }


    public function update() {
        $postData = input('post.');
        Db::table('friends')->update($postData);
    }

    public function queryList()
    {
        $data = Db::table('')->select();
        return json($data);
    }
}
