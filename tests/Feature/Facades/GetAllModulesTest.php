<?php

namespace Maestriam\Maestro\Tests\Feature\Console;

use Maestriam\Maestro\Support\Maestro;
use Maestriam\Maestro\Tests\TestCase;

class GetAllModulesTest extends TestCase
{
    public function testGetAllModules()
    {
        $modules = Maestro::modules()->all();

        $this->assertIsArray($modules);
    }
}