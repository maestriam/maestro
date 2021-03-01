<?php

namespace Maestriam\Maestro\Tests\Units\Json;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Entities\Resources\BlankView;

class CreateBlankViewTest extends TestCase
{
    public function testCreateRouteProvider()
    {        
        $module   = $this->getModuleInstance();
        $provider = new BlankView($module);

        $file = $provider->setName('index')->create();

        $this->assertContentHasParsed($file);
    }
}