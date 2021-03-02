<?php

namespace Maestriam\Maestro\Tests\Feature;

use Maestriam\Maestro\Tests\TestCase;

class CreateViewCommandTest extends TestCase
{
    public function testCreateViewCmd()
    {
        $parameters = ['name' => 'Aldebaran', 'module' => 'Taurus'];

        $output = 'View created.';

        $this->artisan('maestro:view', $parameters)
             ->expectsOutput($output);
    }
}
