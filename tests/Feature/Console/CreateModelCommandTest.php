<?php

namespace Maestriam\Maestro\Tests\Feature\Console;

use Maestriam\Maestro\Tests\TestCase;

class CreateModelCommandTest extends TestCase
{
    public function testCreateModelCmd()
    {
        $module  = 'Heracles';
        $output  = 'Model created.';
        $command = 'maestro:model';

        $this->getModuleInstance($module)->create();

        $params = ['name' => 'Algethi', 'module' => $module];

        $this->artisan($command, $params)->expectsOutput($output);
    }
}
