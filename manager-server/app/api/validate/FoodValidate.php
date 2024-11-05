<?php

namespace app\api\validate;

use think\Validate;

class FoodValidate extends Validate
{
    protected $rule = [
        'user_id'  =>  'require|max:25',
        'name' =>  'require',
        'price' =>  'require',
        'images' =>  'require',
        'date' =>  'require',
        'time' =>  'require',
        // 'notes' =>  'require',
    ];

    protected $message = [
        'user_id'  =>  'require|max:25',
        'name'  =>  '用户名必须',
        'price' =>  'require',
        'images' =>  'require',
        'date' =>  'require',
        'time' =>  'require',
        // 'notes' =>  'require',
    ];
}

