<?php

namespace app\api\validate;

use think\Validate;

class NoteValidate extends Validate
{
    protected $rule = [
        'title'  =>  'require|max:50',
        'content' =>  '',
    ];

    protected $message = [
        'title'  =>  '用户名必须',
        'content' =>  '邮箱格式错误',
    ];
}

