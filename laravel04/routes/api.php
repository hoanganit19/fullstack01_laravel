<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', function () {
    return [
        [
            'name' => 'Sản phẩm 1',
            'price' => 12000,
        ],

        [
            'name' => 'Sản phẩm 2',
            'price' => 13000,
        ],

        [
            'name' => 'Sản phẩm 3',
            'price' => 14000,
        ],
    ];
})->name('api.products');
