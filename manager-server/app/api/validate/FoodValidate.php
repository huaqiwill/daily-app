<?php

namespace app\api\validate;

use think\Validate;

class FoodValidate extends Validate
{
    protected $rule = [
        'user_id'  =>  'require',
        'name' =>  'require',
        'price' =>  'require',
        'images' =>  'require',
        'date' =>  'require',
        'time' =>  'require',
        // 'notes' =>  'require',
    ];

    protected $message = [
        'user_id'  =>  '用户ID必须',
        'name'  =>  '标题必须',
        'price' =>  '价格必须',
        'images' =>  '图片必须',
        'date' =>  '日期必须',
        'time' =>  '时间必须',
        // 'notes' =>  'require',
    ];
}

