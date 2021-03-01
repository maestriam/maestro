<?php

namespace Maestriam\Maestro\Tests\Units\Route;

use Maestriam\Maestro\Entities\Routes\ComposerRoute;
use Maestriam\Maestro\Entities\Routes\WebRoute;
use Maestriam\Maestro\Tests\TestCase;

class CreateWebRouteTest extends TestCase
{
    public function testCreateWebRoute()
    {        
        $module = $this->getModuleInstance();
        $route  = new WebRoute($module);                        
        $file   = $route->create();

        $this->assertContentHasParsed($file);
    }
}