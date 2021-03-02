<?php

namespace Maestriam\Maestro\Tests\Unit\Controllers;

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
        $module     = $this->getModuleInstance('Sagittarius');
        $controller = new BlankController($module);
        
        $file = $controller
                    ->setClassName('Aiolos')
                    ->create();

        $this->assertContentHasParsed($file);
    }
}