<?php

namespace Maestriam\Maestro\Tests\Units\Json;

use Maestriam\Maestro\Entities\Jsons\ModuleJson;

class CreateModuleJsonTest extends JsonTestCase
{
    public function testCreateModuleJson()
    {        
        $module = $this->getModuleInstance();
        $json   = new ModuleJson($module);                
        $file   = $json->create();

        $this->assertContentHasParsed($file);
    }
}