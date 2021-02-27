<?php

namespace Maestriam\Maestro\Concerns;

use Maestriam\Maestro\Entities\Containers\ResourceContainer;

/**
 * Concede o poder de manipulação aos services providers
 */
trait ManagesResources
{
    /**
     * Retorna a instância de controle dos service providers
     *
     * @return ResourceContainer
     */
    public function view() : ResourceContainer
    {
        $module = $this->getModuleName();
        $route  = new ResourceContainer();

        return $route->module($module);
    }    
}