<?php

namespace Maestriam\Maestro\Tests\Units\Json;

use Maestriam\Maestro\Entities\Providers\BlankServiceProvider;

class CreateBlankProviderTest extends JsonTestCase
{
    public function testCreateBlankProvider()
    {        
        $module   = $this->getModuleInstance();
        $provider = new BlankServiceProvider($module);

        $file = $provider->setClassName('Index')->create();

        $this->assertContentHasParsed($file);
    }
}