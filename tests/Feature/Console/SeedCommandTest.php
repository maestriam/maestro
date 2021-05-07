<?php

namespace Maestriam\Maestro\Tests\Feature\Console;

use Maestriam\Maestro\Tests\TestCase;

class SeedCommandTest extends TestCase
{
    public function testMigrateCmd()
    {
        $module  = 'Canis';  
        $output  = 'Module seeded.';
        
        $this->artisan('maestro:module', ['name' => $module]);
        
        $command = 'maestro:seed';
        $params  = ['module' => $module];        

        $this->artisan($command, $params)->expectsOutput($output);
    }
}
