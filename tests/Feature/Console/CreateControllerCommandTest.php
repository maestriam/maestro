<?php

namespace Maestriam\Maestro\Tests\Feature\Console;

use Maestriam\Maestro\Tests\TestCase;

class CreateControllerCommandTest extends TestCase
{
    public function testCreateControllerCmd()
    {
        $output = 'Controller created.';

        $parameters = ['name' => 'Hyoga', 'module' => 'Swan'];

        $this
            ->artisan('maestro:controller', $parameters)
            ->expectsOutput($output);
    }
}
