<?php
use Illuminate\Support\Facades\Route;
Route::group(['namespace' => 'Modules\{moduleName}\src\Http\Controllers', 'prefix' => '{modulePrefix}'], function () {
    //Route Here
});