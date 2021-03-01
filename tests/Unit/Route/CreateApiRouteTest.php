<?php

namespace Maestriam\Maestro\Tests\Units\Route;

use Maestriam\Maestro\Entities\Routes\ApiRoute;
use Maestriam\Maestro\Entities\Routes\ComposerRoute;
use Maestriam\Maestro\Entities\Routes\WebRoute;
use Maestriam\Maestro\Tests\TestCase;

class CreateApiRouteTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateApiRoute()
    {
        $module = $this->getModuleInstance();

        $api  = new ApiRoute($module);
        $file = $api->create();

        $this->assertContentHasParsed($file);
    }
}