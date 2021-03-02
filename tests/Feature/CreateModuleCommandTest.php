<?php

namespace Maestriam\Maestro\Tests\Feature;

use Maestriam\Maestro\Tests\TestCase;

class CreateModuleCommandTest extends TestCase
{
    public function testCreateControllerCmd()
    {
        $params = ['name' => 'Andromeda'];
        $output = 'Module created.';

        $this->artisan('maestro:module', $params)
             ->expectsOutput($output);
    }
}
