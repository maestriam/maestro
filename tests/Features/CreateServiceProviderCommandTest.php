<?php

namespace Maestriam\Maestro\Tests\Features;

use Maestriam\Maestro\Tests\TestCase;

class CreateServiceProviderCommandTest extends TestCase
{
    public function testCreateControllerCmd()
    {
        $parameters = [
            'name'   => 'Command', 
            'module' => 'SandBox'
        ];

        $output = 'Service provider created.';

        $this->artisan('maestro:provider', $parameters)
             ->expectsOutput($output);
    }
}
