<?php

namespace Maestriam\Maestro\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class StartConfigurationCommand extends Command
{
     /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maestro:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize configurations and download basic modules.';

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
        Artisan::call('maestro:set-autoload');
        Artisan::call('maestro:fake-database');

        $this->info('Configurated with successful.');
    }
}