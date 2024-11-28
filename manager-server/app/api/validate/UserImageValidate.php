<?php

namespace app\api\validate;

use think\Validate;

class UserImageValidate extends Validate
{
    protected $rule = [
        'user_id'  =>  'require',
        'date' =>  'require',
        'images' => 'require',
        // 'position' => '',
        // 'weather' => '',
    ];

    protected $message = [
        'user_id'  =>  '用户ID必须',
        'date' =>  '日期必须',
        'images' => '画像必须',
    ];
}
