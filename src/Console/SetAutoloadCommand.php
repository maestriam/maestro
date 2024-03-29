<?php

namespace Maestriam\Maestro\Console;

use Illuminate\Console\Command;
use Maestriam\Maestro\Foundation\Setup\AutoloadSetup;

class SetAutoloadCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maestro:set-autoload';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set Maestro modules autoload into composer.json.';

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
        $autoload = new AutoloadSetup();

        $autoload->setup();

        return $this->info('Autoload defined in composer.json');
    }
}