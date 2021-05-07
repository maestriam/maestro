<?php

namespace Maestriam\Maestro\Tests\Feature\Console;

use Maestriam\Maestro\Tests\TestCase;

class MigrateCommandTest extends TestCase
{
    public function testMigrateCmd()
    {
        $module = 'Canis';

        $params = ['module' => $module, 'name' => 'AddMajorSirius'];

        $this->artisan('maestro:migration', $params);

        $this->artisan('maestro:migrate', ['module' => $module])
             ->expectsOutput('Module migrated.');
    }
}
