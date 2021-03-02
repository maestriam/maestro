<?php

namespace Maestriam\Maestro\Tests\Unit\Model;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Entities\Model\BlankModel;

class CreateBlankModelTest extends TestCase
{
    public function testCreateBlankModel()
    {        
        $module = $this->getModuleInstance('Ophiucus');        
        $model  = new BlankModel($module);
                                
        $file = $model->setClassName('Shina')->create();

        $this->assertContentHasParsed($file);
    }
}