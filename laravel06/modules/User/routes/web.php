<?php

use Illuminate\Support\Facades\Route;
Route::group(['namespace' => 'Modules\User\src\Http\Controllers', 'prefix' => 'users'], function () {
    Route::get('/', 'UserController@index');

    Route::get('/add', 'UserController@add');
});
