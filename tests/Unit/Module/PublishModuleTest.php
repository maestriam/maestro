<?php

namespace Maestriam\Maestro\Tests\Unit\Modules;

use Maestriam\Maestro\Tests\TestCase;

class PublishModuleTest extends TestCase
{

    public function testPublishModule()
    {
        $module = $this->getModuleInstance()->create();

        $path = $module->assetsPath();
        $ret = $module->publishAssets();

        $this->assertIsString($path);
        $this->assertIsBool($ret);
        $this->assertTrue($ret);
    }

}