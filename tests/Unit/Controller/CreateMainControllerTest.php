<?php

namespace Maestriam\Maestro\Tests\Unit\Controllers;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Entities\Controllers\MainController;

class CreateMainControllerTest extends TestCase
{
    public function setUp() : void
    {
        parent::setUp();
    }

    public function testCreateBlank()
    {
        $module     = $this->getModuleInstance('Serpentario');
        $controller = new MainController($module);
        
        $file = $controller->create();

        $this->assertContentHasParsed($file);
    }
}