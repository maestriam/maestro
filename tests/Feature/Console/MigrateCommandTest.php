<?php

namespace Maestriam\Maestro\Tests\Feature\Console;

use Maestriam\Maestro\Tests\TestCase;

class MigrateCommandTest extends TestCase
{
    public function testMigrateCmd()
    {
        $module  = 'Canis';
        $command = 'maestro:migrate';        
        $output  = 'Module migrated.';
        
        $this->getModuleInstance($module)->create();
        
        $create  = ['module' => $module, 'name' => 'AddMajorSirius'];
        $migrate = ['module' => $module];
        
        $this->artisan('maestro:migration', $create);
        $this->artisan($command, $migrate)->expectsOutput($output);
    }
}
