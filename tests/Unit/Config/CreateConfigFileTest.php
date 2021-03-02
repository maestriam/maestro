<?php

namespace Maestriam\Maestro\Tests\Unit\Config;

use Maestriam\Maestro\Entities\Config\ConfigFile;
use Maestriam\Maestro\Tests\TestCase;

class CreateConfigFileTest extends TestCase
{
    public function setUp() : void
    {
        parent::setUp();
    }

    public function testCreateBlank()
    {
        $module = $this->getModuleInstance('Eagle');
        $config = new ConfigFile($module);
        
        $file = $config->create();

        $this->assertContentHasParsed($file);
    }
}