<?php

namespace Maestriam\Maestro\Tests\Unit\Foundation\Composer;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Foundation\Setup\AutoloadSetup;

class AutoloadSetupTest extends TestCase
{
    public function testAutoloadEditor()
    {
        $autoload = new AutoloadSetup();

        $this->assertNull($autoload->setup());
    }
}