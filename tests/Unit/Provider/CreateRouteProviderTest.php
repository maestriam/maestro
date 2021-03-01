<?php

namespace Maestriam\Maestro\Tests\Units\Json;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Entities\Providers\RouteServiceProvider;

class CreateRouteProviderTest extends TestCase
{
    public function testCreateRouteProvider()
    {        
        $module   = $this->getModuleInstance();
        $provider = new RouteServiceProvider($module);

        $file = $provider->create();

        $this->assertContentHasParsed($file);
    }
}