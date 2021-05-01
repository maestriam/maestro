<?php

namespace Maestriam\Maestro\Tests\Unit\Foundation\Database;

use Illuminate\Support\Facades\Artisan;
use Maestriam\Maestro\Entities\Module;
use Maestriam\Maestro\Foundation\Database\Migrator;
use Maestriam\Maestro\Tests\TestCase;

class MigratorTest extends TestCase
{
    /**
     * Undocumented function
     *
     * @return void
     */
    // public function testRollbackMigration()
    // {        
    //     $module = $this->initModule();

    //     $migrator = new Migrator($module);

    //     $ret = $migrator->rollback();
    // }

    public function testMigrateModule()
    {
        $module = $this->initModule();

        

        $ret = Artisan::call('migrate', ['--path' => 'sandbox/Phoenix/Database/Migrations/']);
    }

    /**
     * Retorna o módulo com migrations executados para testes de rollback
     *
     * @return void
     */
    private function initModule() : Module
    {
        $file = 'add_migration_file';

        $module = $this->getModuleInstance('Phoenix');       

        return $module;
    }
}