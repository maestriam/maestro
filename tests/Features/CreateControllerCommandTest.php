<?php

namespace Maestriam\Maestro\Tests\Features;

use Maestriam\Maestro\Tests\TestCase;

class CreateControllerCommandTest extends TestCase
{
    public function testCreateControllerCmd()
    {
        $parameters = [
            'name'   => 'Foo', 
            'module' => 'SandBox'
        ];

        $output = 'Controller created.';

        $this
            ->artisan('maestro:controller', $parameters)
            ->expectsOutput($output);
    }
}
