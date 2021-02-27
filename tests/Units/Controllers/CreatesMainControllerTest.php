<?php

namespace Maestriam\Maestro\Tests\Units\Controllers;

use Maestriam\Maestro\Entities\Controllers\MainController;

class CreatesMainControllerTest extends ControllerTestCase
{
    public function setUp() : void
    {
        parent::setUp();
    }
    
    public function testCreateController()
    {
        $modulename = 'SandBox';
        
        $this->createController($modulename);
    }

    public function createController($modulename)
    {
        $controller = new MainController();
        
        $file = $controller
                    ->module($modulename)
                    ->create();

        $this->assertControllerFile($file);
        $this->assertControllerObject($controller);
    }
}