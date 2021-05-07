<?php

namespace Maestriam\Maestro\Tests\Feature\Console;

use Maestriam\Maestro\Tests\TestCase;

class SeedCommandTest extends TestCase
{
    public function testMigrateCmd()
    {
        $module  = 'Canis';  
        $migrate = ['module' => $module, 'name' => 'AddMajorSirius'];

        $this->artisan('maestro:migration', $migrate);

        $params  = ['module' => $module];
        $output  = 'Module migrated.';
        $command = 'maestro:seed';

        $this->artisan($command, $params)->expectsOutput($output);
    }
}
