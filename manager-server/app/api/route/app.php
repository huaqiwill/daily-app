<?php

use think\facade\Route;

Route::get('/', function () {
    return 'hello,api';
});

// 登录路由
Route::post('login', 'Login/login');
Route::post('register', 'Login/register');
Route::post('resetPassword', 'Login/resetPassword');

// 用户路由
Route::get('user', 'User/queryList');
Route::get('user/<id>', 'User/query');
Route::post('user', 'User/create');
Route::put('user/:id', 'User/update');
Route::delete('user/:id', 'User/delete');

// 账单路由
Route::get('bill', 'Bill/queryList');
Route::get('bill/<id>', 'Bill/query');
Route::post('bill', 'Bill/create');
Route::put('bill/:id', 'Bill/update');
Route::delete('bill/:id', 'Bill/delete');

// 生日路由
Route::get('birth/<id>', 'Birth/query');
Route::get('birth', 'Birth/queryList');
Route::post('birth', 'Birth/create');
Route::put('birth/<id>', 'Birth/update');
Route::delete('birth/<id>', 'Birth/delete');

// 档案路由
Route::get('friend/<id>', 'Friend/query');
Route::get('friend', 'Friend/queryList');
Route::post('friend', 'Friend/create');
Route::put('friend/:id', 'Friend/update');
Route::delete('friend/:id', 'Friend/delete');

// 待办路由
Route::get('todo', 'Todo/queryList');
Route::get('todo/<id>', 'Todo/query');
Route::post('todo', 'Todo/create');
Route::put('todo/<id>', 'Todo/update');
Route::delete('todo/<id>', 'Todo/delete');

// 笔记路由
Route::get('note', 'Note/queryList');
Route::get('note/<id>', 'Note/query');
Route::post('note', 'Note/create');
Route::put('note/<id>', 'Note/update');
Route::delete('note/<id>', 'Note/delete');
