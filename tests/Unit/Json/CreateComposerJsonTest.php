<?php

namespace Maestriam\Maestro\Tests\Units\Json;

use Maestriam\Maestro\Entities\Jsons\ComposerJson;

class CreateComposerJsonTest extends JsonTestCase
{
    public function testCreateComposerJson()
    {        
        $module = $this->getModuleInstance();

        $json   = new ComposerJson($module);  
                      
        $file   = $json->create();

        $this->assertContentHasParsed($file);
    }
}