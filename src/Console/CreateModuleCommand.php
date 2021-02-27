<?php

namespace Maestriam\Maestro\Console;

use Illuminate\Console\Command;
use Maestriam\Maestro\Support\Maestro;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CreateModuleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maestro:module {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new module.';

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
        $name = $this->argument('name');

        Maestro::module($name)->create()->active();

        $this->info('Module created.');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name',   InputArgument::REQUIRED, 'Module name.'],
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
