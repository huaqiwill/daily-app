<?php

use think\facade\Route;

Route::get('/', function () {
    return 'hello,api';
});
Route::get('/hello',function(){
    return "test api";
});

// 登录路由
Route::post('login', 'LoginController/login');
Route::post('register', 'LoginController/register');
Route::post('resetPassword', 'LoginController/resetPassword');

// 用户路由
Route::get('user', 'UserController/queryList');
Route::get('user/<id>', 'UserController/query');
Route::post('user', 'UserController/create');
Route::put('user/:id', 'UserController/update');
Route::delete('user/:id', 'UserController/delete');

// 账单路由
Route::get('bill', 'BillController/queryList');
Route::get('bill/<id>', 'BillController/query');
Route::post('bill', 'BillController/create');
Route::put('bill/:id', 'BillController/update');
Route::delete('bill/:id', 'BillController/delete');

// 生日路由
Route::get('birth/<id>', 'BirthController/query');
Route::get('birth', 'BirthController/queryList');
Route::post('birth', 'BirthController/create');
Route::put('birth/<id>', 'BirthController/update');
Route::delete('birth/<id>', 'BirthController/delete');

// 档案路由
Route::get('friend/<id>', 'FriendController/query');
Route::get('friend', 'FriendController/queryList');
Route::post('friend', 'FriendController/create');
Route::put('friend/:id', 'FriendController/update');
Route::delete('friend/:id', 'FriendController/delete');

// 待办路由
Route::get('todo', 'TodoController/queryList');
Route::get('todo/<id>', 'TodoController/query');
Route::post('todo', 'TodoController/create');
Route::put('todo/<id>', 'TodoController/update');
Route::delete('todo/<id>', 'TodoController/delete');

// 笔记路由
Route::get('note', 'NoteController/queryList');
Route::get('note/<id>', 'NoteController/query');
Route::post('note', 'NoteController/create');
Route::put('note/<id>', 'NoteController/update');
Route::delete('note/<id>', 'NoteController/delete');


Route::get('friend','FriendController/querList');
Route::get('friend/<id>','FriendController/query');
Route::get('friend','FriendController/create');
Route::get('friend/<id>','FriendController/update');
Route::get('friend/<id>','FriendController/delete');