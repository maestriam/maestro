<?php

namespace Maestriam\Maestro\Tests\Unit\Foundation\Database;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Entities\Module;
use Maestriam\Maestro\Foundation\Database\Seeder;

class SeederTest extends TestCase
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function testRootSeederPath()
    {        
        $module = $this->initModule();
        
        $seeder = new Seeder($module);

        $path = $seeder->root();

        $this->assertFileExists($path);
    }

    /**
     * Verifica
     *
     * @return void
     */
    public function testSeedModule()
    {
        $module = $this->initModule();

        $seeder = new Seeder($module);

        // dd($seeder->seed());
    }

    /**
     * Retorna o módulo com migrations executados para testes de rollback
     *
     * @return void
     */
    private function initModule() : Module
    {
        return $this->getModuleInstance('Phoenix');
    }
}