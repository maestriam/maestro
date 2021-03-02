<?php

namespace Maestriam\Maestro\Tests\Unit\Migration;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Entities\Database\MainMigration;

class CreateMainMigrationTest extends TestCase
{
    public function testCreateBlankModel()
    {        
        $module = $this->getModuleInstance('Lizard');        
        $model  = new MainMigration($module);
                                
        $file = $model
                    ->setClassName('CreateMistyTable')
                    ->create();

        $this->assertContentHasParsed($file);
    }
}