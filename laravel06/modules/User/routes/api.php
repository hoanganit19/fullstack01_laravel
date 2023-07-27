<?php
Route::get('/users', function () {
    return 'API Users';
})->middleware('test');
