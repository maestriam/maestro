<?php

namespace Maestriam\Maestro\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InstallAdminModuleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maestro:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Admin module for a Laravel application.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Artisan::call('maestro:init');

        exec('composer require maestro-module/admin');

        $this->info('Admin module for Maestro installed. Execute php artisan admin:setup to configure module.');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [ ];
    }
}