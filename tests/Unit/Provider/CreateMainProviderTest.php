<?php

namespace Maestriam\Maestro\Tests\Units\Json;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Entities\Providers\MainServiceProvider;

class CreateMainProviderTest extends TestCase
{
    public function testCreateMainProvider()
    {        
        $module   = $this->getModuleInstance();
        $provider = new MainServiceProvider($module);

        $file = $provider->create();

        $this->assertContentHasParsed($file);
    }
}