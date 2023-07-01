<?php

namespace Maestriam\Maestro\Console;

use Illuminate\Console\Command;
use Maestriam\Maestro\Support\Maestro;
use Symfony\Component\Console\Input\InputArgument;

class CreateSeedCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maestro:seeder {module} {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '.';

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
        try {
            
            $module = $this->argument('module');

            $name = $this->argument('name');
    
            Maestro::module($module)->database()->seeder($name)->create();

            $this->info('Seeder created.');

        } catch (\Exception $e) {

            $this->error('Error to create seeder');
        }
        

    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['module',   InputArgument::REQUIRED, 'Module name.'],
            ['name',   InputArgument::REQUIRED, 'Seed name.'],
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
