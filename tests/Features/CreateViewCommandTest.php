<?php

namespace Maestriam\Maestro\Tests\Features;

use Maestriam\Maestro\Tests\TestCase;

class CreateViewCommandTest extends TestCase
{
    public function testCreateViewCmd()
    {
        $parameters = [
            'name'   => 'Command', 
            'module' => 'SandBox'
        ];

        $output = 'Service provider created.';

        $this->artisan('maestro:view', $parameters)
             ->expectsOutput($output);
    }
}
