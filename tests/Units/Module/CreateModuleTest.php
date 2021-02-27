<?php

namespace Maestriam\Maestro\Tests\Units\Modules;

use Maestriam\Maestro\Entities\Module;
use Maestriam\Maestro\Tests\TestCase;

class CreateModuleTest extends TestCase
{
    public function setUp() : void
    {
        parent::setUp();
    }

    public function testCreateValidModule()
    {
        $name   = 'Foo';
        $module = new Module($name, $this->app);

        $module->create();
    }
}