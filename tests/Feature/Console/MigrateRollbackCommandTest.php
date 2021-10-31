<?php

namespace Maestriam\Maestro\Tests\Feature\Console;

use Maestriam\Maestro\Tests\TestCase;

class MigrateRollbackCommandTest extends TestCase
{
    public function testMigrateCmd()
    {
        $module = 'Canis';

        $message = 'Module rollback.';
        $execute = ['module' => $module];
        $migrate = ['module' => $module, 'name' => 'AddMajorSirius'];

        $this->artisan('maestro:migration', $migrate);
        $this->artisan('maestro:migrate', $execute);
        $this->artisan('maestro:rollback', $execute)->expectsOutput($message);
    }
}
