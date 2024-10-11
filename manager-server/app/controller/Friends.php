<?php

namespace app\controller;

use app\BaseController;
use think\facade\Db;

class Friends extends BaseController
{
    public function add()
    {
        $data = [
            'name' => '张三',
            'age' => 18,
        ];
        Db::table('')->insert($data);
    }

    public function delete() {}

    public function find() {}

    public function edit() {}
}
