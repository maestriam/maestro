<?php

namespace Maestriam\Maestro\Concerns;

use Maestriam\Maestro\Entities\Containers\RouteContainer;

/**
 * Concede o poder de manipulação aos services providers
 */
trait ManagesRoutes
{
    /**
     * Retorna a instância de controle dos service providers
     *
     * @return RouteContainer
     */
    public function route() : RouteContainer
    {
        $module = $this->getModuleName();
        $route  = new RouteContainer();

        return $route->module($module);
    }    
}