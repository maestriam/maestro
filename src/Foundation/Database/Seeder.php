<?php

namespace Maestriam\Maestro\Foundation\Database;

use Illuminate\Support\Facades\Artisan;
use Maestriam\Maestro\Entities\Module;
use Maestriam\Maestro\Foundation\Registers\FileRegister;

class Seeder
{
    private Module $module;

    public function __construct(Module $module)
    {
        $this->setModule($module);
    }

    private function setModule(Module $module) : Seeder
    {
        $this->module = $module;

        return $this;
    }

    private function namespace() : string 
    {
        return 'Database\\Seeders\\';
    }
    
    public function root() : string
    {
        $namespace = $this->module->namespace() . $this->namespace();

        $class = $this->module->name() . 'Seeder';

        return $namespace . $class;
    }

    public function seed() : string|null
    {
        try {

            $seeder = $this->root();

            if (! class_exists($seeder)) {
                FileRegister::from($this->module->seedPath());
            }

            Artisan::call('db:seed', ['--class' => $seeder]);
            
            return null;
            
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}