<?php

namespace Maestriam\Maestro\Foundation\Database;

use Illuminate\Support\Facades\Artisan;
use Maestriam\Maestro\Entities\Module;

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

    public function root() : string
    {
        $folder = $this->module->seedPath();       
        
        dd($this->module->namespace());
        
        $filename = $this->module->name() . 'Seeder.php';

        return $folder . $filename;
    }

    public function seed() : bool
    {
        try {

            $seeder = $this->root();

            Artisan::call('db:seed', ['--class' => $seeder]);
            
            return true;
            
        } catch (\Exception $e) {    
            dd($e);
            return false;
        }

    }
}