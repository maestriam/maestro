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
    public function testRollbackMigration()
    {        
        $module = $this->initModule();

        $migrator = new Migrator($module);

        $ret = $migrator->rollback();

        $this->assertTrue($ret);
    }

    /**
     * Retorna o módulo com migrations executados para testes de rollback
     *
     * @return void
     */
    private function initModule() : Module
    {
        $file = 'add_migration_file';

        $module = $this->getModuleInstance('Phoenix')->create();

        $module->database()->migration($file)->create();

        $module->database()->migrate();

        return $module;
    }
}