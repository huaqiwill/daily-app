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
Route::get('download/:date/:type/:filename', 'FileController/download')
    ->pattern(['date' => '\d{8}', 'type' => '\w+', 'filename' => '\w+\.\w+']);

// 用户
Route::get('user/getuser', 'UserController/test');
Route::get('user/<id>', 'UserController/query');
Route::get('user', 'UserController/queryList');
Route::post('user', 'UserController/create');
Route::put('user/:id', 'UserController/update');
Route::delete('user/:id', 'UserController/delete');

// 账单
Route::get('bill', 'BillController/queryList');
Route::get('bill/<id>', 'BillController/query');
Route::post('bill', 'BillController/create');
Route::put('bill/:id', 'BillController/update');
Route::delete('bill/:id', 'BillController/delete');


// 待办
Route::get('todo', 'TodoController/queryList');
Route::get('todo/<id>', 'TodoController/query');
Route::post('todo', 'TodoController/create');
Route::put('todo/<id>', 'TodoController/update');
Route::delete('todo/<id>', 'TodoController/delete');

// 笔记
Route::get('note', 'NoteController/queryList');
Route::get('note/<id>', 'NoteController/query');
Route::post('note', 'NoteController/create');
Route::put('note/<id>', 'NoteController/update');
Route::delete('note/<id>', 'NoteController/delete');


// 关系
Route::get('friend', 'FriendController/queryList');
Route::get('friend/<id>', 'FriendController/query');
Route::get('friend', 'FriendController/create');
Route::get('friend/<id>', 'FriendController/update');
Route::get('friend/<id>', 'FriendController/delete');

// 生日
Route::get('birth/<id>', 'BirthController/query');
Route::get('birth', 'BirthController/queryList');
Route::post('birth', 'BirthController/create');
Route::put('birth/<id>', 'BirthController/update');
Route::delete('birth/<id>', 'BirthController/delete');

// 饮食
Route::get('food', 'FoodController/queryList');
Route::get('food/<id>', 'FoodController/query');
Route::post('food', 'FoodController/create');
Route::put('food/<id>', 'FoodController/update');
Route::delete('food/<id>', 'FoodController/delete');
