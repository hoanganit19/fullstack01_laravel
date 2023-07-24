<?php
namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
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
        $modulePath = base_path() . '/modules';

        $modules = File::directories($modulePath);

        if ($modules) {
            //$modules = array_map('basename', $modules); //basename() => trả về tên của 1 đường dẫn
            foreach ($modules as $module) {
                $this->registerModule($module);
            }
        }

    }

    public function registerModule($path)
    {
        //Khai báo routes
        if (File::exists($path . '/routes/web.php')) {
            Route::middleware(['web'])->group(function () use ($path) {
                $this->loadRoutesFrom($path . '/routes/web.php');
            });

            Route::middleware(['api'])->prefix('api')->group(function () use ($path) {
                $this->loadRoutesFrom($path . '/routes/api.php');
            });
        }

        //Khai báo migrations
        if (File::exists($path . '/migrations')) {
            $this->loadMigrationsFrom($path . '/migrations');
        }

        //Khai báo languages
        if (File::exists($path . '/resources/languages')) {
            //language file php
            $this->loadTranslationsFrom($path . '/resources/languages', strtolower(basename($path)));

            //language file JSON
            $this->loadJSONTranslationsFrom($path . 'resources/languages');
        }

        //Khai báo views
        if (File::exists($path . '/resources/views')) {
            //language file php
            $this->loadViewsFrom($path . '/resources/views', strtolower(basename($path)));
        }
    }
}
