<?php

namespace Maestriam\Maestro\Tests\Feature\Console;

use Maestriam\Maestro\Tests\TestCase;

class CreateMigrationCommandTest extends TestCase
{
    public function testCreateMigrationCmd()
    {
        $output = 'Migration created.';

        $parameters = [
            'module' => 'Hound',
            'name'   => 'AddHoundAsterion', 
        ];

        $this
            ->artisan('maestro:migration', $parameters)
            ->expectsOutput($output);
    }
}
