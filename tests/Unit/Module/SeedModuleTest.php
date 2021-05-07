<?php

namespace Maestriam\Maestro\Tests\Unit\Modules;

use Maestriam\Maestro\Tests\TestCase;

class SeedModuleTest extends TestCase
{
    /**
     * {@inheritDoc}
     */
    public function setUp() : void
    {
        parent::setUp();
    }

    public function testSeedModule()
    {
        $module = $this->getModuleInstance('Crespo')->create();

        $ret = $module->database()->seed();

        $this->assertTrue($ret);
    }
}