<?php

namespace Maestriam\Maestro\Console;

use Illuminate\Console\Command;
use Maestriam\Maestro\Support\Maestro;
use Symfony\Component\Console\Input\InputArgument;

class PublishModuleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maestro:publish {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish assets from modules.';

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
        $name = $this->argument('module');
                
        $module = Maestro::module($name)->findOrFail();

        $response = $module->publishAssets();

        if ($response) {
            return $this->info('Module published. ');
        }

        return $this->error('Error in publishing.');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['module', InputArgument::REQUIRED, 'Module name.']
        ];
    }
}