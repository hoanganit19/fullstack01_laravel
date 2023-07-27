<?php
namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\User\src\Commands\TestCommand;
use Modules\User\src\Http\Middlewares\TestMiddleware;
use Modules\User\src\Repositories\UserRepository;
use Modules\User\src\Repositories\UserRepositoryInterface;

class ModuleServiceProvider extends ServiceProvider
{

    private $moduleFolder = "modules";

    private $middlewares = [
        'test' => TestMiddleware::class,
    ];

    private $commands = [
        TestCommand::class,
    ];

    public function register(): void
    {
        $modules = $this->getModules();

        foreach ($modules as $module) {
            $this->loadConfig($module);
        }

        $this->loadMiddleware();

        $this->commands($this->commands);

        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $modules = $this->getModules();

        if ($modules) {
            //$modules = array_map('basename', $modules); //basename() => trả về tên của 1 đường dẫn
            foreach ($modules as $module) {
                $this->registerModule($module);
            }
        }

    }

    public function getModules()
    {
        $modulePath = base_path() . '/' . $this->moduleFolder;

        $modules = File::directories($modulePath);

        return $modules;
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

    public function loadConfig($path)
    {
        $configFolder = $path . '/configs';
        $files = File::allFiles($configFolder);
        foreach ($files as $file) {
            $alias = pathinfo($file)['filename'];

            $this->mergeConfigFrom($file, $alias);
        }
    }

    public function loadMiddleware()
    {
        $middlewares = $this->middlewares;
        foreach ($middlewares as $key => $middleware) {
            $this->app['router']->pushMiddlewareToGroup($key, $middleware);
        }
    }
}
