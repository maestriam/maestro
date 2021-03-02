<?php

namespace Maestriam\Maestro\Tests\Unit\Json;

use Maestriam\Maestro\Entities\Providers\BlankServiceProvider;
use Maestriam\Maestro\Tests\TestCase;

class CreateBlankProviderTest extends TestCase
{
    public function testCreateBlankProvider()
    {        
        $module   = $this->getModuleInstance('Leo');
        $provider = new BlankServiceProvider($module);

        $file = $provider->setClassName('Aiolia')->create();

        $this->assertContentHasParsed($file);
    }
}