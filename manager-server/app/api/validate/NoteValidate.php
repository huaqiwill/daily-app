<?php

namespace app\api\validate;

use think\Validate;

class NoteValidate extends Validate
{
    protected $rule = [
        'user_id' => 'require',
        'title'  =>  'require|max:50',
        // 'content' =>  'require',
        'date' => 'require'
    ];

    protected $message = [
        'user_id' => '用户ID必须',
        // 'title'  =>  '标题必须',
        // 'content' =>  '邮箱格式错误',
        'date' => '日期必须',
    ];
}
