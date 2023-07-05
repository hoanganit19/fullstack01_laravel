<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

//admin
//admin/users
//admin/users/add
//admin/users/edit/{id}
//admin/users/delete/{id}
//admin/products
//admin/posts

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return '<h1>Dashboard</h1>';
    })->name('index');

    // Route::prefix('/users')->name('users.')->group(function () {
    //     Route::get('/', function () {
    //         return '<h1>Users</h1>';
    //     })->name('index');

    //     Route::get('/add', function () {
    //         return '<h1>Users Add</h1>';
    //     })->name('add');

    //     Route::get('/edit/{id}', function ($id) {
    //         return '<h1>Users Edit '.$id.'</h1>';
    //     })->name('edit');
    // });

    Route::resource('/users', UserController::class);
    Route::resource('/groups', GroupController::class);
    Route::resource('/posts', PostController::class);
    Route::resource('/categories', CategoryController::class);

    // Route::get('/products', function () {
    //     return '<h1>Products</h1>';
    // })->name('products');

    // Route::get('/posts', function () {
    //     return '<h1>Posts</h1>';
    // })->name('posts');
});

Route::get('/show', function () {
    echo route('admin.index').'<br/>';
    echo route('admin.users.index').'<br/>';
    echo route('admin.users.add').'<br/>';
    echo route('admin.users.edit', 1).'<br/>';
});

Route::get('/login', function () {
    return 'Login';
})->name('login');