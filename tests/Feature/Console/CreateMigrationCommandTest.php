<?php

namespace Maestriam\Maestro\Tests\Feature\Console;

use Maestriam\Maestro\Tests\TestCase;

class CreateMigrationCommandTest extends TestCase
{
    public function testCreateMigrationCmd()
    {
        $module  = 'Hound';
        $command = 'maestro:migration';
        $output  = 'Migration created.';

        $this->getModuleInstance($module)->create();

        $params = [
            'module' => $module, 
            'name'   => 'AddHoundAsterion'
        ];

        $this->artisan($command, $params)->expectsOutput($output);
    }
}
