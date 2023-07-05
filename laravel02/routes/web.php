<?php

use App\Models\User;
use App\Models\Product;
use App\Mail\SendMailOrder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Notifications\LoginNotification;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\ResetPasswordController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/auth/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/auth/login', [LoginController::class, 'login']);

// Route::get('/auth/dat-lai-mat-khau?token={token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

Route::get('auth/dat-lai-mat-khau', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/test', function(){
//      $user = User::find(31);
//     // Notification::send($user, new LoginNotification());
//     //$user->notify(new LoginNotification());

//     //Mail::to($user)->send(new SendMailOrder($order));
// });

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/products', ProductController::class);

    Route::resource('/posts', PostController::class);
});