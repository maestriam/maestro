<?php

namespace Maestriam\Maestro\Tests\Units\Routes;

use Maestriam\Maestro\Entities\Routes\WebRoute;
use Maestriam\Maestro\Tests\TestCase;

class CreatesWebRouteTest extends TestCase
{
    public function testCreateRoute()
    {
        $route = new WebRoute();

        $file = $route->module('SandBox')->create();

        $this->assertContentHasParsed($file);
    }
}