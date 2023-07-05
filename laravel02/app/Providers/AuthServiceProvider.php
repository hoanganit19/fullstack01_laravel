<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Module;
use App\Models\Product;
use App\Policies\ProductPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Product::class => ProductPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        // ResetPassword::createUrlUsing(function (User $user, string $token) {
        //     return 'http://127.0.0.1:8000/auth/dat-lai-mat-khau?token='.$token;
        // });

        // $modules = Module::all();
    
        // foreach ($modules as $module){
        //     Gate::define($module->name.'.view', function(){
        //         //tự xử lý logic để return true hoặc false
        //         return false;
        //     });

        //     Gate::define($module->name.'.update', function(){
        //         //tự xử lý logic để return true hoặc false
        //         return false;
        //     });

        //     Gate::define($module->name.'.create', function(){
        //         //tự xử lý logic để return true hoặc false
        //         return false;
        //     });

        //     Gate::define($module->name.'.delete', function(){
        //         //tự xử lý logic để return true hoặc false
        //         return false;
        //     });
        // }

    }
}

//Trong Database
//+Table modules

/*
1 user => Có quyền xem sản phẩm
+ Xem tất cả
+ Chỉ xem sản phẩm của mình
1 user => Có quyền thêm sản phẩm
1 user => có quyền sửa sản phẩm
+ Sửa của tất cả mọi người trong module sản phẩm
+ Chỉ được sửa của sản phẩm user đó thêm
1 user => Có quyền xóa sản phẩm
+ Xóa tất cả
+ Chỉ được xóa sản phẩm của user đó
*/