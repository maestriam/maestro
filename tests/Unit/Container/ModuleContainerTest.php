<?php

namespace Maestriam\Maestro\Tests\Unit\Container;

use Maestriam\Maestro\Entities\Containers\ModuleContainer;
use Maestriam\Maestro\Entities\Module;
use Maestriam\Maestro\Tests\TestCase;

class ModuleContainerTest extends TestCase
{
    public function setUp() : void
    {
        parent::setUp();
    }

    public function testGetAllModules()
    {
        $this->getModuleInstance('Kraken')->create();

        $collection = new ModuleContainer($this->app);

        $modules = $collection->all();        
        $module  = $modules[0];        

        $this->assertIsArray($modules);
        $this->assertInstanceOf(Module::class, $module);
        $this->assertIsBool($module->exists());
    }
}