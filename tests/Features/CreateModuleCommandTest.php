<?php

namespace Maestriam\Maestro\Tests\Features;

use Maestriam\Maestro\Tests\TestCase;

class CreateModuleCommandTest extends TestCase
{
    public function testCreateControllerCmd()
    {
        $params = ['name' => 'Nulo'];
        $output = 'Module created.';

        $this->artisan('maestro:module', $params)
             ->expectsOutput($output);
    }
}
