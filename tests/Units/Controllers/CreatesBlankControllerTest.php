<?php

namespace Maestriam\Maestro\Tests\Units\Controllers;

use Maestriam\Maestro\Entities\Controllers\BlankController;

class CreatesBlankControllerTest extends ControllerTestCase
{
    public function setUp() : void
    {
        parent::setUp();
    }

    public function testCreateController()
    {
        $controller = new BlankController();
        $modulename = 'SandBox';
        $classname  = 'SandBox'; 

        $file = $controller
                    ->name($classname)
                    ->module($modulename)
                    ->create();

        $this->assertControllerObject($controller);
        $this->assertControllerFile($file);
    }
}
