<?php

namespace Maestriam\Maestro\Tests\Feature\Console;

use Maestriam\Maestro\Tests\TestCase;

class CreateServiceProviderCommandTest extends TestCase
{
    public function testCreateControllerCmd()
    {
        $parameters = ['name' => 'Shiryu', 'module' => 'Dragon'];

        $output = 'Service provider created.';

        $this->artisan('maestro:provider', $parameters)
             ->expectsOutput($output);
    }
}
