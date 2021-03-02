<?php

namespace Maestriam\Maestro\Entities\Containers;

use Maestriam\Maestro\Entities\Containers\BaseContainer;
use Maestriam\Maestro\Entities\Providers\BlankServiceProvider;
use Maestriam\Maestro\Entities\Providers\MainServiceProvider;
use Maestriam\Maestro\Entities\Providers\RouteServiceProvider;

class ProviderContainer extends BaseContainer
{
    /**
     * Retorna um service provider principal
     *
     * @return MainServiceProvider
     */
    public function main() : MainServiceProvider
    {
        $module = $this->module();

        return new MainServiceProvider($module);  
    }    

    /**
     * Retorna um service provider em branco com um nome específico
     *
     * @param string $name
     * @return BlankServiceProvider
     */
    public function blank(string $name) : BlankServiceProvider
    {
        $module = $this->module();

        $provider = new BlankServiceProvider($module);

        return $provider->setClassName($name);
    }
    
    /**
     * Retorna um service provider para as rotas do módulo
     *
     * @return RouteServiceProvider
     */
    public function route() : RouteServiceProvider
    {
        $module = $this->module();

        return new  RouteServiceProvider($module);
    }


    public function init() : ProviderContainer
    {
        $this->route()->create();
        $this->main()->create();

        return $this;
    }
}