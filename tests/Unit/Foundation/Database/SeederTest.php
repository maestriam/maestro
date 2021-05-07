<?php

namespace Maestriam\Maestro\Tests\Unit\Foundation\Database;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Foundation\Database\Seeder;

class SeederTest extends TestCase
{    
    public function testSeedModuleWithSingleSeeder()
    {
        $module = $this->getModuleInstance('Phoenix')->create();

        $module->create();

        $seeder = new Seeder($module);

        $ret = $seeder->seed();

        $this->assertTrue($ret);
    }

    public function testSeedModuleWithMultipleSeeders()
    {
        $module = $this->getModuleInstance('BlackPhoenix')->create();    

        $module->database()->seeder('Ikki')->create();

        $seeder = new Seeder($module);

        $ret = $seeder->seed();

        $this->assertTrue($ret);
    }
}
