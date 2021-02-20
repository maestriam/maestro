<?php

namespace Maestriam\Maestro\Tests\Units\BlankController;

use Maestriam\Maestro\Entities\Controllers\BlankController;
use Maestriam\Maestro\Tests\TestCase;

class CreatesBlankControllerTest extends TestCase
{
    public function testCreateController()
    {
        $controller = new BlankController();
        $modulename = 'SandBox';
        $classname  = 'SandBox';

        $file = $controller
                    ->name($classname)
                    ->module($modulename)
                    ->create();

        $this->assertObjectHasAttribute('name', $controller);
        $this->assertObjectHasAttribute('filename', $controller);
        $this->assertObjectHasAttribute('module', $controller);

        $this->assertFileExists($file->path);
    }
}
