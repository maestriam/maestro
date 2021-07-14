<?php

namespace Maestriam\Maestro\Entities\Containers;

use Maestriam\Maestro\Entities\Containers\BaseContainer;


class TestContainer extends BaseContainer
{
    /**
     * Retorna a instância para controle do arquivo de rotas web
     *
     * @return WebRoute
     */
    public function feature() : WebRoute
    {  
        $module = $this->module();

        return new WebRoute($module);
    }
    
    /**
     * Retorna a instância para controle do arquivo de rotas de API
     *
     * @return ApiRoute
     */
    public function unit() : ApiRoute
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