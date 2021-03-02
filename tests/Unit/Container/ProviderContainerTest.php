<?php

namespace Maestriam\Maestro\Tests\Unit\Container;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Entities\Containers\ProviderContainer;
use Maestriam\Maestro\Entities\Providers\BlankServiceProvider;
use Maestriam\Maestro\Entities\Providers\MainServiceProvider;

class ProviderContainerTest extends TestCase
{
    /**
     * Verifica se o container uma instância 
     * de um service provider principal
     *
     * @return void
     */
    public function testMainServiceProvidertInstance()
    {
        $container = $this->getInstance();
        $provider  = $container->main();
        
        $this->assertInstanceOf(MainServiceProvider::class, $provider);
    }
    
    /**
     * Verifica se o container uma instância 
     * de um service provider em branco
     *
     * @return void
     */
    public function testBlankServiceProviderInstance()
    {
        $container = $this->getInstance();
        $provider  = $container->blank('Shaka');        

        $this->assertInstanceOf(BlankServiceProvider::class, $provider);
    }

    /**
     * Retorna a instância do container
     *
     * @return ProviderContainer
     */
    private function getInstance() : ProviderContainer
    {
        $module    = $this->getModuleInstance('Gemini');
        
        return new ProviderContainer($module);
    }
}
