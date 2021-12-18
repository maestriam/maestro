<?php

namespace Maestriam\Maestro\Tests\Feature\Console;

use Maestriam\Maestro\Tests\TestCase;

class CreateServiceProviderCommandTest extends TestCase
{
    public function testCreateControllerCmd()
    {
        $module  = 'Dragon';
        $command = 'maestro:provider';
        $output  = 'Service provider created.';

        $this->getModuleInstance($module)->create();

        $params = ['name' => 'Shiryu', 'module' => $module];

        $this->artisan($command, $params)->expectsOutput($output);
    }
}
