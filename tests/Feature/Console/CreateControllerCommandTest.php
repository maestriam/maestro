<?php

namespace Maestriam\Maestro\Tests\Feature\Console;

use Maestriam\Maestro\Tests\TestCase;

class CreateControllerCommandTest extends TestCase
{
    public function testCreateControllerCmd()
    {        
        $module  = 'Swan';
        $command = 'maestro:controller';

        $this->getModuleInstance($module)->create();
        
        $output = 'Controller created.';
        $params = ['name' => 'Hyoga', 'module' => $module];

        $this->artisan($command, $params)->expectsOutput($output);
    }
}
