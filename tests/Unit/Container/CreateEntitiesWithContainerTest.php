<?php

namespace Maestriam\Maestro\Tests\Units\Controllers;

use Maestriam\Maestro\Tests\TestCase;

class CreateEntitiesWithContainerTest extends TestCase
{
    public function setUp() : void
    {
        parent::setUp();
    }

    public function testCreateBlank()
    {        
        $module = $this->getModuleInstance();

        $file = $module->controller()
                       ->blank('Blog')
                       ->create();

        $this->assertContentHasParsed($file);
    }
}