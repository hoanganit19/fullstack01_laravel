<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ModuleRequestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:request {module} {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $moduleName = $this->argument('module');
        $name = $this->argument('name');

        $modulePath = base_path() . '/modules/' . $moduleName;

        $templatePath = app_path() . '/Console/Commands/Templates';

        $request = File::get($templatePath . '/request.tpl');

        $request = str_replace('{name}', $name, $request);
        $request = str_replace('{moduleName}', $moduleName, $request);

        File::put($modulePath . '/src/Http/Requests/' . $name . '.php', $request);

        $this->info("Request $name được tạo thành công");
    }
}
