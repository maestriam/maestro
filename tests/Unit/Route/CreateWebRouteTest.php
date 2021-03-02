<?php

namespace Maestriam\Maestro\Tests\Unit\Route;

use Maestriam\Maestro\Entities\Routes\ComposerRoute;
use Maestriam\Maestro\Entities\Routes\WebRoute;
use Maestriam\Maestro\Tests\TestCase;

class CreateWebRouteTest extends TestCase
{
    public function testCreateWebRoute()
    {        
        $module = $this->getModuleInstance('Libra');

        $route  = new WebRoute($module);                        
        $file   = $route->create();

        $this->assertContentHasParsed($file);
    }
}