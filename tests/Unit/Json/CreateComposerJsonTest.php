<?php

namespace Maestriam\Maestro\Tests\Unit\Json;

use Maestriam\Maestro\Entities\Jsons\ComposerJson;
use Maestriam\Maestro\Tests\TestCase;

class CreateComposerJsonTest extends TestCase
{
    public function testCreateComposerJson()
    {        
        $module = $this->getModuleInstance();
        
        $json = new ComposerJson($module);                        
        $file = $json->create();

        $this->assertContentHasParsed($file);
    }
}