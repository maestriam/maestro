<?php

namespace Maestriam\Maestro\Tests\Feature\Console;

use Maestriam\Maestro\Tests\TestCase;

class SeedCommandTest extends TestCase
{
    public function testMigrateCmd()
    {
        $module = 'Canis';      

        $this->artisan('maestro:module', ['name' => $module]);
        
        $command = 'maestro:seed';
        $output  = 'Module seeded.';
        $params  = ['module' => $module];        

        $this->artisan($command, $params)->expectsOutput($output);
    }
}
