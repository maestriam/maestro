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

    /**
     * Define o módulo que ficará responsável pelo arquivo
     *
     * @param Module $module
     * @return void
     */
    public function setModule(Module $module)
    {
        $this->module = $module;       
        return $this;
    }

    /**
     * Retorna o módulo que o arquivo está contido
     */
    public function module() : Module
    {
        return $this->module;
    }
}
