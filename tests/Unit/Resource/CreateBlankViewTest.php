<?php

namespace Maestriam\Maestro\Tests\Unit\Json;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Entities\Resources\BlankView;

class CreateBlankViewTest extends TestCase
{
    public function testCreateRouteProvider()
    {        
        $module   = $this->getModuleInstance('Scorpio');
        $provider = new BlankView($module);

        $file = $provider->setName('Miro')->create();

        $this->assertContentHasParsed($file);
    }
}