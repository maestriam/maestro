<?php

namespace Maestriam\Maestro\Foundation\Database;

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

    public function scan()
    {
        $path = $this->module->seedPath();       
        
        dd($path);
    }
}