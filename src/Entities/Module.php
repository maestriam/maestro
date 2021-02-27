<?php

namespace Maestriam\Maestro\Entities;

use Illuminate\Container\Container;
use Maestriam\Maestro\Concerns\ActivesModule;
use Nwidart\Modules\Activators\FileActivator;
use Maestriam\Maestro\Concerns\HandlesJsons;
use Maestriam\Maestro\Concerns\HasModuleAttribute;
use Maestriam\Maestro\Concerns\ManagesConfigFile;
use Maestriam\Maestro\Concerns\ManagesControllers;
use Maestriam\Maestro\Concerns\ManagesProviders;
use Maestriam\Maestro\Concerns\ManagesResources;
use Maestriam\Maestro\Concerns\ManagesRoutes;
use Maestriam\Maestro\Entities\Config\ConfigFile;

class Module
{
    use HasModuleAttribute, 
        ManagesControllers, 
        ManagesConfigFile,
        ManagesProviders, 
        ManagesResources,
        ActivesModule,
        ManagesRoutes,
        HandlesJsons;

    /**
     * Instância de aplicação Laravel
     */
    protected Container $app;

    /**
     * Classe para operações gerais de módulo
     *
     * @param string $name
     * @param \Illuminate\Container\Container $app
     */
    public function __construct(string $name, Container $app)
    {
        $this->setApp($app)->name($name);
    }

    /**
     * Cria um novo modulo
     *
     * @return void
     */
    public function create() : self
    {        
        $this->moduleJson()->create();
        $this->composerJson()->create();        
        $this->controller()->main()->create();        
        $this->provider()->main()->create();
        $this->provider()->route()->create();
        $this->route()->web()->create();
        $this->configFile()->create();
        $this->view()->blank('index')->create();

        return $this;
    }

    /**
     * Define o nome do módulo
     *
     * @param string $name
     * @return Module
     */
    public function name(string $name) : self
    {
        $this->moduleName = ucfirst($name);

        return $this;
    }       
    
    /**
     * Muda o status do modulo para ativo
     *
     * @return void
     */
    public function activate()
    {
        $activator = new FileActivator($this->app);

        $activator->setActiveByName($this->moduleName, true);
    }

    /**
     * Define a instância da aplicação Laravel
     *
     * @param Container $app
     * @return self
     */
    private function setApp(Container $app) : self
    {
        $this->app = $app;

        return $this;
    }

}