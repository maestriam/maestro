<?php

namespace Maestriam\Maestro\Console;

use Illuminate\Console\Command;
use Maestriam\Maestro\Support\Maestro;
use Symfony\Component\Console\Input\InputArgument;

class CreateModelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maestro:model {module} {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new model for a maestro module.';

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
        $name   = $this->argument('name');
        $module = $this->argument('module');

        Maestro::module($module)
               ->database()
               ->model($name)
               ->create();

        $this->info('Model created.');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['module', InputArgument::REQUIRED, 'Module name.'],
            ['name',   InputArgument::REQUIRED, 'Model name.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            // ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
