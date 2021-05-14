<?php

namespace Maestriam\Maestro\Tests\Unit\Modules;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Entities\Tests\UnitTest;

class CreateUnitTestFileTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateUnitFile()
    {
        $module = $this->getModuleInstance('Whale');        
        
        $test = new UnitTest($module);

        $file = $test->setClassName('Moses')->create();

        $this->assertContentHasParsed($file);
    }
}