<?php

namespace Maestriam\Maestro\Tests\Units\Controllers;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Entities\Controllers\BlankController;
use Maestriam\Maestro\Entities\Controllers\MainController;

class CreateMainControllerTest extends TestCase
{
    public function setUp() : void
    {
        parent::setUp();
    }

    public function testCreateBlank()
    {
        $module     = $this->getModuleInstance();
        $controller = new MainController($module);
        
        $file = $controller->create();

        $this->assertContentHasParsed($file);
    }
}