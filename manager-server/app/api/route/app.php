<?php

use think\facade\Route;

Route::get('/', function () {
    return 'hello,api';
});
Route::get('/hello', function () {
    return "test api";
});

// 登录
Route::post('login', 'LoginController/login');
Route::post('register', 'LoginController/register');
Route::post('resetPassword', 'LoginController/resetPassword');

// 文件
Route::post('upload', 'FileController/upload');
Route::get('download/<date>/<type>/<filename>', 'FileController/download')
    ->pattern(['date' => '\d{8}', 'type' => '\w+', 'filename' => '\w+\.\w+']);

// 用户
Route::get('user/getuser', 'UserController/test');
Route::get('user/<id>', 'UserController/query');
Route::get('user', 'UserController/queryList');
Route::post('user', 'UserController/create');
Route::put('user/:id', 'UserController/update');
Route::delete('user/:id', 'UserController/delete');

// 账单
Route::get('bill/list', 'BillController/queryList');
Route::get('bill/<id>', 'BillController/query');
Route::post('bill', 'BillController/create');
Route::post('bill/<id>', 'BillController/update');
Route::delete('bill/<id>', 'BillController/delete');

// 待办
Route::get('todo/list', 'TodoController/queryList');
Route::get('todo/<id>', 'TodoController/query');
Route::post('todo', 'TodoController/create');
Route::post('todo/edit/<id>', 'TodoController/update');
Route::delete('todo/<id>', 'TodoController/delete');

// 笔记
Route::get('note/list', 'NoteController/queryList');
Route::get('note/<id>', 'NoteController/query');
Route::post('note', 'NoteController/create');
Route::post('note/edit/<id>', 'NoteController/update');
Route::delete('note/<id>', 'NoteController/delete');

// 关系
Route::get('friend/list', 'FriendController/queryList');
Route::get('friend/<id>', 'FriendController/query');
Route::post('friend', 'FriendController/create');
Route::post('friend/edit/<id>', 'FriendController/update');
Route::delete('friend/<id>', 'FriendController/delete');

// 生日
Route::get('birth/list', 'BirthController/queryList');
Route::get('birth/<id>', 'BirthController/query');
Route::post('birth', 'BirthController/create');
Route::post('birth/edit/<id>', 'BirthController/update');
Route::delete('birth/<id>', 'BirthController/delete');

// 饮食
Route::get('food/list', 'FoodController/queryList');
Route::get('food/<id>', 'FoodController/query');
Route::post('food', 'FoodController/create');
Route::post('food/edit/<id>', 'FoodController/update');
Route::delete('food/<id>', 'FoodController/delete');

// 用户画像
Route::get('userImage/list', 'UserImageController/queryList');
Route::get('userImage/<id>', 'UserImageController/query');
Route::post('userImage', 'UserImageController/create');
Route::post('userImage/edit/<id>', 'UserImageController/update');
Route::delete('userImage/<id>', 'UserImageController/delete');
