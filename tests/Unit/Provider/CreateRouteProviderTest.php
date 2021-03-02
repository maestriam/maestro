<?php

namespace Maestriam\Maestro\Tests\Unit\Json;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Entities\Providers\RouteServiceProvider;

class CreateRouteProviderTest extends TestCase
{
    public function testCreateRouteProvider()
    {        
        $module   = $this->getModuleInstance('Aquarius');
        $provider = new RouteServiceProvider($module);

        $file = $provider->create();

        $this->assertContentHasParsed($file);
    }
}