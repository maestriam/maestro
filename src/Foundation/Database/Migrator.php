<?php

namespace Maestriam\Maestro\Foundation\Database;

use Illuminate\Support\Facades\Artisan;
use Maestriam\Maestro\Entities\Module;

class Migrator
{
    private Module $module;

    public function __construct(Module $module)
    {
        $this->setModule($module);
    }

    private function setModule(Module $module) : Migrator
    {
        $this->module = $module;
        return $this;
    }

    public function rollback()
    {
        try 
        {
            $path = $this->module->migrationPath();

            Artisan::call('migrate-rollback', ['--path' => $path]);
            
            return true;
        
        } catch (\Exception $e) {
            
            return false;
        }
    }
}