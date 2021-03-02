<?php

namespace Maestriam\Maestro\Tests\Unit\Migration;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Entities\Database\BlankMigration;

class CreateBlankMigrationTest extends TestCase
{
    public function testCreateBlankModel()
    {        
        $module = $this->getModuleInstance('Lizard');        
        $model  = new BlankMigration($module);
                                
        $file = $model
                    ->setClassName('AlterMistyTable')
                    ->create();

        $this->assertContentHasParsed($file);
    }
}