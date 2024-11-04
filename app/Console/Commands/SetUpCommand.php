<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SetUpCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the whole project';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {

        Artisan::call("key:generate");
        $this->info(Artisan::output());

        Artisan::call("storage:link");
        $this->info(Artisan::output());

        Artisan::call("migrate:fresh --seed");
        $this->info(Artisan::output());

        return 0;
    }
}