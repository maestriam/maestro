<?php

namespace Maestriam\Maestro\Tests\Unit\Factory;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Entities\Database\BlankFactory;

class CreateBlankFactory extends TestCase
{
    public function testCreateBlankModel()
    {        
        $module  = $this->getModuleInstance('Lyra');
        $factory = new BlankFactory($module);
                                
        $file = $factory
                    ->setClassName('Orphee')
                    ->create();

        $this->assertContentHasParsed($file);
    }
}