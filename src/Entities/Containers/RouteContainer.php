<?php

namespace Maestriam\Maestro\Entities\Containers;

use Maestriam\Maestro\Entities\Containers\BaseContainer;
use Maestriam\Maestro\Entities\Routes\ApiRoute;
use Maestriam\Maestro\Entities\Routes\WebRoute;

class RouteContainer extends BaseContainer
{
    /**
     * Retorna a instância para controle do arquivo de rotas web
     *
     * @return WebRoute
     */
    public function web() : WebRoute
    {  
        $module = $this->module();

        return new WebRoute($module);
    }
    
    /**
     * Retorna a instância para controle do arquivo de rotas de API
     *
     * @return ApiRoute
     */
    public function api() : ApiRoute
    {
        $module = $this->module();

        return new ApiRoute($module);
    }

    /**
     * Cria todas as rotas dentro do módulo
     *
     * @return void
     */
    public function init() 
    {
        $this->api()->create();
        $this->web()->create();
    }
}