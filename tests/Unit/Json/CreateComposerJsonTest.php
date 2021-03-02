<?php

namespace Maestriam\Maestro\Tests\Unit\Json;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Entities\Jsons\ComposerJson;

class CreateComposerJsonTest extends TestCase
{
    public function testCreateComposerJson()
    {        
        $module = $this->getModuleInstance('Aries');
        
        $json = new ComposerJson($module);                        
        $file = $json->create();

        $this->assertContentHasParsed($file);
    }
}