<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:sends {name} {email=contact@unicode.vn} {--port=3000}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Send Email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        $name = $this->argument('name');
        $port = $this->option('port');
        $this->error("Sending..." . $email);
        $this->error("Sending..." . $name);
        $this->info('Port: ' . $port);
    }
}
