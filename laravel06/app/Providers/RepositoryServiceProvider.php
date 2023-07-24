<?php

namespace App\Providers;

use App\Repositories\Users\MongoUserRepository;
use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //User
        $this->app->singleton(
            UserRepositoryInterface::class,
            MongoUserRepository::class
        );

        //Product

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
