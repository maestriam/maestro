<?php

namespace Maestriam\Maestro\Tests\Unit\Json;

use Maestriam\Maestro\Entities\Jsons\ModuleJson;
use Maestriam\Maestro\Tests\TestCase;

class CreateModuleJsonTest extends TestCase
{
    public function testCreateModuleJson()
    {        
        $module = $this->getModuleInstance('Pisces');
        
        $json = new ModuleJson($module);                
        $file = $json->create();

        $this->assertContentHasParsed($file);
    }
}