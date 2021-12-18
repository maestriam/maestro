<?php

namespace Maestriam\Maestro\Tests\Feature\Console;

use Maestriam\Maestro\Tests\TestCase;

class CreateViewCommandTest extends TestCase
{
    public function testCreateViewCmd()
    {
        $module  = 'Taurus';
        $command = 'maestro:view';
        $output  = 'View created.';

        $this->getModuleInstance($module)->create();

        $params = ['name' => 'Aldebaran', 'module' => $module];

        $this->artisan($command, $params)->expectsOutput($output);
    }
}
