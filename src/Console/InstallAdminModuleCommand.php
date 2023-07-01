<?php

namespace Maestriam\Maestro\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Maestriam\Maestro\Support\Maestro;
use Symfony\Component\Console\Input\InputArgument;

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
    protected $description = 'Install admin module for a Laravel application.';

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
        exec('composer require maestro-module/admin');
        Artisan::call('admin:init');

        $this->info('Service provider created.');
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