<?php

namespace Maestriam\Maestro\Console;

use Illuminate\Console\Command;
use Maestriam\Maestro\Foundation\Setup\FakeDatabaseSetup;

class SetFakeDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maestro:fake-database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set Maestro modules autoload into composer.json.';

    private $database;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->init();
        parent::__construct();
    }

    public function init()
    {
        $this->database = new FakeDatabaseSetup();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->database->setup();

        return $this->info('Database file created');
    }
}