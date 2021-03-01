<?php

namespace Maestriam\Maestro\Entities\Containers;

use Maestriam\Maestro\Concerns\HasModuleAttribute;
use Maestriam\Maestro\Entities\Module;

class BaseContainer
{
    private Module $module;

    public function __construct(Module $module)
    {
        $this->setModule($module);   
    }

    public function setModule(Module $module)
    {
        $this->module = $module;       
        return $this;
    }

    public function module() : Module
    {
        return $this->module;
    }
}
