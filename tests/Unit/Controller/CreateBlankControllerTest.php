<?php

namespace Maestriam\Maestro\Tests\Units\Controllers;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Entities\Controllers\BlankController;

class CreateBlankControllerTest extends TestCase
{
    public function setUp() : void
    {
        parent::setUp();
    }

    public function testCreateBlank()
    {
        $module     = $this->getModuleInstance();
        $controller = new BlankController($module);
        
        $file = $controller->setClassName('Index')->create();

        $this->assertContentHasParsed($file);
    }
}