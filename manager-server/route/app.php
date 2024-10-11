<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

Route::get('think', function () {
    return 'hello,ThinkPHP6!';
});

Route::get('hello/:name', 'index/hello');

// bill
Route::get('bill/<id>','Bill/read'); // 定义GET请求路由规则
Route::post('bill/<id>','Bill/update'); // 定义POST请求路由规则
Route::put('bill/:id','Bill/update'); // 定义PUT请求路由规则
Route::delete('bill/:id','Bill/delete'); // 定义DELETE请求路由规则

// user
Route::get('user/<id>','User/read'); // 定义GET请求路由规则
Route::post('user/<id>','User/update'); // 定义POST请求路由规则
Route::put('user/:id','User/update'); // 定义PUT请求路由规则
Route::delete('user/:id','User/delete'); // 定义DELETE请求路由规则

// friends
Route::get('friends/<id>','Friends/read'); // 定义GET请求路由规则
Route::post('friends/<id>','Friends/update'); // 定义POST请求路由规则
Route::put('friends/:id','Friends/update'); // 定义PUT请求路由规则
Route::delete('friends/:id','Friends/delete'); // 定义DELETE请求路由规则

// todos
Route::get('todos/<id>','News/read'); // 定义GET请求路由规则
Route::post('todos/<id>','News/update'); // 定义POST请求路由规则
Route::put('todos/:id','News/update'); // 定义PUT请求路由规则
Route::delete('todos/:id','News/delete'); // 定义DELETE请求路由规则

// notes
Route::get('notes/<id>','News/read'); // 定义GET请求路由规则
Route::post('notes/<id>','News/update'); // 定义POST请求路由规则
Route::put('notes/:id','News/update'); // 定义PUT请求路由规则
Route::delete('notes/:id','News/delete'); // 定义DELETE请求路由规则

