<?php

namespace Maestriam\Maestro\Concerns;

use Maestriam\Maestro\Entities\Containers\ProviderContainer;

/**
 * Concede o poder de manipulação aos services providers
 */
trait ManagesProviders
{
    /**
     * Retorna a instância de controle dos service providers
     *
     * @return ProviderContainer
     */
    public function provider() : ProviderContainer
    {
        $module   = $this->getModuleName();
        $provider = new ProviderContainer();

        return $provider->module($module);
    }    
}