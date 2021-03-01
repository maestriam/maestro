<?php

namespace Maestriam\Maestro\Tests\Units\Json;

use Maestriam\Maestro\Entities\Jsons\ModuleJson;
use Maestriam\Maestro\Entities\Module;

class InstanceModuleTest extends JsonTestCase
{
    public function testCreateModuleJson()
    {
        $module = new Module('Box', $this->app);        

        $this->assertModuleObject($module);
    }

    public function assertModuleObject($module)
    {
        $this->assertIsString($module->name());
        $this->assertIsString($module->vendor());
        $this->assertIsString($module->namespace());
    }
}