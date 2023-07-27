<?php
use Illuminate\Support\Facades\Route;
Route::group(['namespace' => 'Modules\Product\src\Http\Controllers', 'prefix' => 'product'], function () {
    //Route Here
    Route::get('/', "ProductController@index");
});