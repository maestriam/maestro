<?php

namespace Maestriam\Maestro\Tests\Unit\Foundation\Composer;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Foundation\Setup\EnvSetup;

class EnvSetupTest extends TestCase
{
    public function testEnvSetup()
    {
        $autoload = new EnvSetup();

        $this->assertNull($autoload->setup());
    }
}