<?php

namespace Maestriam\Maestro\Tests\Unit\Modules;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Exceptions\ModuleAlreadyExistsException;

class CreateModulesTest extends TestCase
{
    public function testCreatingExistingModule()
    {
        $module = $this->getModuleInstance('Bear')->create();
                    
        $this->expectException(ModuleAlreadyExistsException::class);

        $module->create();
    }
}