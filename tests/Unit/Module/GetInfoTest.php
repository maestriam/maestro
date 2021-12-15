<?php

namespace Maestriam\Maestro\Tests\Unit\Modules;

use Maestriam\Maestro\Entities\Module;
use Maestriam\Maestro\Tests\TestCase;

class GetInfoTest extends TestCase
{
    /**
     * {@inheritDoc}
     */
    public function setUp() : void
    {
        parent::setUp();
    }

    /**
     * Verifica se consegue pegar as informações do módulo, 
     * vindo do arquivo module.json na raiz do módulo.  
     *
     * @return void
     */
    public function testInfo()
    {
        $module = $this->getModuleInstance('Crespo')->create();

        $info = $module->info();

        $this->assertIsObject($info);
        $this->assertObjectHasAttribute('name', $info);
        $this->assertGreaterThan(0, $info->name);
    }
}