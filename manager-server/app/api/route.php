<?php

use think\facade\Route;

Route::get('think', function () {
    return 'hello,ThinkPHP6!';
});


Route::group("api", function () {

    Route::get('/', function () {
        return 'hello,api';
    });

    // bill
    Route::get('bill', 'Bill/list');
    Route::get('bill/<id>', 'Bill/find');
    Route::post('bill', 'Bill/add');
    Route::put('bill/:id', 'Bill/update');
    Route::delete('bill/:id', 'Bill/delete');

    // 生日管理
    Route::get('birth', 'Birth/queryList');
    Route::get('birth/<id>', 'Birth/query');
    Route::post('birth', 'Birth/create');
    Route::put('birth/<id>', 'Birth/update');
    Route::delete('birth/<id>', 'Birth/delete');

    // login
    Route::post('login', 'Login/login');


    // user
    Route::get('user', 'User/list');
    Route::get('user/<id>', 'User/find');
    Route::post('user', 'User/add');
    Route::put('user/:id', 'User/edit');
    Route::delete('user/:id', 'User/delete');

    // friends
    Route::get('friend', 'Friends/find');
    Route::get('friend/<id>', 'Friends/list');
    Route::post('friend', 'Friends/add');
    Route::put('friend/:id', 'Friends/update');
    Route::delete('friend/:id', 'Friends/delete');

    // todos
    Route::get('todos/<id>', 'Todos/find');
    Route::get('todos/<id>', 'Todos/list');
    Route::post('todos/<id>', 'Todos/add');
    Route::put('todos/:id', 'Todos/update');
    Route::delete('todos/:id', 'Todos/delete');

    // notes
    Route::get('notes/<id>', 'Notes/find');
    Route::get('notes/<id>', 'Notes/list');
    Route::post('notes/<id>', 'Notes/add');
    Route::put('notes/:id', 'Notes/update');
    Route::delete('notes/:id', 'Notes/delete');
});
