<?php

namespace Maestriam\Maestro\Tests\Units\Providers;

use Maestriam\Maestro\Entities\Providers\BlankServiceProvider;

class CreatesBlankServiceProviderTest extends ProviderTestCase
{
    public function setUp() : void
    {
        parent::setUp();
    }
    
    public function testCreateController()
    {
        $name   = 'Foo';
        $module = 'SandBox';
        $provider = new BlankServiceProvider();

        $file = $provider
                    ->name($name)
                    ->module($module)
                    ->create();

        $this->assertContentHasParsed($file);
    }
}
