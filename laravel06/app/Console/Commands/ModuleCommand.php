<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ModuleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:make {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command Create Module';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');

        //Kiểm tra Module có tồn tại hay không?
        $modulePath = base_path() . '/modules/' . $name;

        $templatePath = app_path() . '/Console/Commands/Templates';

        if (File::exists($modulePath)) {
            $this->error("Module $name đã tồn tại");
        } else {
            //Tạo Folder theo tên Module
            $status = File::makeDirectory($modulePath);

            if ($status) {

                //Tạo tiếp các folder con

                //Config
                if (!File::exists($modulePath . '/configs')) {
                    File::makeDirectory($modulePath . '/configs');

                    //Tạo file config
                    File::put($modulePath . '/configs/' . strtolower($name) . '.php', File::get($templatePath . '/config.tpl'));
                }

                //Migration
                if (!File::exists($modulePath . '/migrations')) {
                    File::makeDirectory($modulePath . '/migrations');
                }

                //Resources
                if (!File::exists($modulePath . '/resources')) {
                    File::makeDirectory($modulePath . '/resources');

                    File::makeDirectory($modulePath . '/resources/languages');

                    File::makeDirectory($modulePath . '/resources/views');

                    File::put($modulePath . '/resources/views/' . strtolower($name) . '.php', "");
                }

                //Routes
                if (!File::exists($modulePath . '/routes')) {
                    File::makeDirectory($modulePath . '/routes');

                    //Route Web
                    $route = File::get($templatePath . '/route_web.tpl');

                    $route = str_replace('{moduleName}', $name, $route);

                    $route = str_replace('{modulePrefix}', strtolower($name), $route);

                    File::put($modulePath . '/routes/' . 'web.php', $route);

                    //Route API
                    $route = File::get($templatePath . '/route_api.tpl');

                    $route = str_replace('{moduleName}', $name, $route);

                    $route = str_replace('{modulePrefix}', strtolower($name), $route);

                    File::put($modulePath . '/routes/' . 'api.php', $route);
                }

                //src
                if (!File::exists($modulePath . '/src')) {
                    File::makeDirectory($modulePath . '/src');

                    File::makeDirectory($modulePath . '/src/Commands');

                    File::makeDirectory($modulePath . '/src/Http');

                    File::makeDirectory($modulePath . '/src/Http/Controllers');

                    $controller = File::get($templatePath . '/controller.tpl');

                    $controller = str_replace('{moduleName}', $name, $controller);

                    File::put($modulePath . '/src/Http/Controllers/' . $name . 'Controller.php', $controller);

                    File::makeDirectory($modulePath . '/src/Http/Middlewares');

                    File::makeDirectory($modulePath . '/src/Http/Requests');

                    File::makeDirectory($modulePath . '/src/Models');

                    $model = File::get($templatePath . '/model.tpl');

                    $model = str_replace('{moduleName}', $name, $model);

                    File::put($modulePath . '/src/Models/' . $name . '.php', $model);

                    File::makeDirectory($modulePath . '/src/Repositories');

                    $repository = File::get($templatePath . '/repository.tpl');
                    $repository = str_replace('{moduleName}', $name, $repository);

                    File::put($modulePath . '/src/Repositories/' . $name . 'Repository.php', $repository);

                    $repositoryInterface = File::get($templatePath . '/repository_interface.tpl');
                    $repositoryInterface = str_replace('{moduleName}', $name, $repositoryInterface);

                    File::put($modulePath . '/src/Repositories/' . $name . 'RepositoryInterface.php', $repositoryInterface);

                }

                $this->info("Module $name đã được tạo thành công");
            }

        }
    }
}