<?php

namespace Maestriam\Maestro\Tests\Units\Providers;

use Maestriam\Maestro\Entities\Providers\MainServiceProvider;

class CreatesMainServiceProviderTest extends ProviderTestCase
{
    public function setUp() : void
    {
        parent::setUp();
    }
    
    public function testCreateController()
    {
        $module   = 'SandBox';
        $provider = new MainServiceProvider();

        $file = $provider->module($module)->create();

        $this->assertContentHasParsed($file);
    }
}
