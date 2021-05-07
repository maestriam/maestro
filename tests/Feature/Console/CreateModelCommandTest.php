<?php

namespace Maestriam\Maestro\Tests\Feature\Console;

use Maestriam\Maestro\Tests\TestCase;

class CreateModelCommandTest extends TestCase
{
    public function testCreateModelCmd()
    {
        $output = 'Model created.'; 

        $parameters = ['name' => 'Algethi', 'module' => 'Heracles'];

        $this
            ->artisan('maestro:model', $parameters)
            ->expectsOutput($output);
    }
}
