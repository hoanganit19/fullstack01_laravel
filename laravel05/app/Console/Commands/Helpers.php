<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Helpers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:helper {name}';

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
        $name = $this->argument('name');
        $appPath = app_path();
        $helperPath = $appPath . '/Helpers';

        $pathFile = $helperPath . '/' . $name . '.php';

        if (File::exists($pathFile)) {
            $this->error('File đã tồn tại');
        } else {

            File::put($pathFile, File::get($appPath . '/Console/Commands/Templates/helper.txt'));

            $this->info('Tạo Helper thành công');
        }
        //$this->info($helperPath);
    }
}
