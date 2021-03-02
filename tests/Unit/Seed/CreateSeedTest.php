<?php

namespace Maestriam\Maestro\Tests\Unit\Modules;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Entities\Database\BlankSeed;

class CreateSeedTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateSeed()
    {
        $module = $this->getModuleInstance('Perseus');        
        
        $seed = new BlankSeed($module);
        $file = $seed->setClassName('Algol')->create();

        $this->assertContentHasParsed($file);
    }
}