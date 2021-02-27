<?php

namespace Maestriam\Maestro\Tests\Units\Resources;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Entities\Resources\BlankView;

class CreateBlankViewTest extends TestCase
{
    public function setUp() : void
    {
        parent::setUp();
    }

    public function testCreateView()
    {
        $name   = 'index';              
        $module = 'SandBox';
        $view   = new BlankView();

        $file = $view->name($name)
                     ->module($module)                     
                     ->create();

        $this->assertContentHasParsed($file);

    }
}