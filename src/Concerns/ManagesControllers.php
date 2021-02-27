<?php

namespace Maestriam\Maestro\Concerns;

use Maestriam\Maestro\Entities\Containers\ControllerContainer;

/**
 * Adiciona poder para gerenciar e manipular os controllers de um módulo
 */
trait ManagesControllers 
{
    /**
     * Retorna a instância para manipulação de controller
     *
     * @param string $name
     * @return \Maestriam\Maestro\Entities\Containers\ControllerContainer
     */
    public function controller() : ControllerContainer
    {
        $module = $this->getModuleName();

        return new ControllerContainer($module);
    }        
}