<?php

namespace App\Providers;

use App\Repositories\Users\MongoUserRepository;
use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}