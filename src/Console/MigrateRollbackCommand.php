<?php

namespace Maestriam\Maestro\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Maestriam\Maestro\Support\Maestro;
use Symfony\Component\Console\Input\InputArgument;

class MigrateRollbackCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maestro:rollback {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rollback migrations for specific module.';

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
        
        if ($name) {
            return $this->migrateModule($name);
        }
    }

    private function migrateModule(string $name)
    {
        $module = Maestro::module($name)->findOrFail();

        //$response = $module->database()->rollback();
        $response = Artisan::call("module:migrate-rollback {$name}");
            
        if ($response === true) {
            return $this->info('Module rollback.');
        }

        return $this->error("Error in rollback: {$response}");
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