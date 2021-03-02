<?php

namespace Maestriam\Maestro\Tests\Unit\Route;

use Maestriam\Maestro\Entities\Routes\ApiRoute;
use Maestriam\Maestro\Tests\TestCase;

class CreateApiRouteTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateApiRoute()
    {
        $module = $this->getModuleInstance('Cancer');

        $api  = new ApiRoute($module);
        $file = $api->create();

        $this->assertContentHasParsed($file);
    }
}