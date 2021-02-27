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
        $provider = new MainServiceProvider();        
        $module   = $this->getModuleName();

        return $provider->module($module);
    }    

    /**
     * Retorna um service provider em branco com um nome específico
     *
     * @param string $name
     * @return BlankServiceProvider
     */
    public function blank(string $name) : BlankServiceProvider
    {
        $provider = new BlankServiceProvider();
        $module   = $this->getModuleName();
        
        return $provider->name($name)->module($module);
    }
    
    /**
     * Retorna um service provider para as rotas do módulo
     *
     * @return RouteServiceProvider
     */
    public function route() : RouteServiceProvider
    {
        $provider = new  RouteServiceProvider();
        $module   = $this->getModuleName();

        return $provider->module($module);
    }

}