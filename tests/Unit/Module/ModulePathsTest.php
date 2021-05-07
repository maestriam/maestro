<?php

namespace Maestriam\Maestro\Tests\Unit\Modules;

use Maestriam\Maestro\Tests\TestCase;

class ModulePathsTest extends TestCase
{
    /**
     * {@inheritDoc}
     */
    public function setUp() : void
    {
        parent::setUp();
    }
    
    /**
     * Verifica se o diretório de migration foi criado corretamente 
     *
     * @return void
     */
    public function testMigrationPath()
    {
        $module = $this->getModuleInstance('Pegasus')->create();

        $path = $module->migrationPath();

        $this->assertDirectoryExists($path);
    }

    /**
     * Verifica se o diretório de seeders foi criado corretamente 
     *
     * @return void
     */
    public function testSeedPath()
    {
        $module = $this->getModuleInstance('Pegasus')->create();

        $path = $module->seedPath();

        $this->assertDirectoryExists($path);
    }
}