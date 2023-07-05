<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProductController;

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

Route::prefix('auth')->group(function () {
    Route::post('login' , [LoginController::class,  'login']);

    Route::get('history', [LoginController::class,  'history'])->middleware('auth:sanctum');

    Route::delete('logout', [LoginController::class,  'logout'])->middleware('auth:sanctum');
});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);

    Route::get('/{user}', [UserController::class, 'view']);

    Route::post('/', [UserController::class, 'store']);

    Route::patch('/{user}', [UserController::class, 'update']);

    Route::delete('/{user}', [UserController::class, 'destroy']);
});

Route::apiResource('products', ProductController::class)->middleware('auth:sanctum');