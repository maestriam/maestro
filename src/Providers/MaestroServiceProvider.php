<?php

namespace Maestriam\Maestro\Providers;

use Maestriam\Maestro\Console\CreateControllerCommand;
use Maestriam\Maestro\Console\CreateModuleCommand;
use Maestriam\Maestro\Console\CreateServiceProviderCommand;
use Maestriam\Maestro\Entities\Maestro;
use Nwidart\Modules\LaravelModulesServiceProvider;
class MaestroServiceProvider extends LaravelModulesServiceProvider
{
    public function boot()
    {
        parent::boot();
        $this->registerConfs();
        $this->registerCommands();
    }

    public function register()
    {
        parent::register();
        $this->registerFacade();        
    }

    protected function registerNamespaces()
    {
        $config = __DIR__ . '/../Config/modules.php';

        $this->mergeConfigFrom($config, 'modules');
    }

    protected function registerFacade()
    {
        $this->app->bind('maestro',function() {
            return new Maestro($this->app);
        });          
    }

    private function registerCommands()
    {
        $this->commands([
            CreateControllerCommand::class,
            CreateModuleCommand::class,
            CreateServiceProviderCommand::class,
        ]);
    }

    /**
     * Registra as configurações do pacote
     *
     * @return ForgeServiceProvider
     */    
    private function registerConfs() : MaestroServiceProvider
    {              
        $source    = __DIR__.'/../Config/config.php';
        $published = config_path('forge.php');

        $this->publishes([$source => $published], 'Maestro');        
        
        $forge  = __DIR__.'/../Config/forge.php';
        $module = __DIR__.'/../Config/modules.php';
        $config = (is_file($published)) ? $published : $source;  

        $this->mergeConfigFrom($forge, 'Maestro:forge');
        $this->mergeConfigFrom($config,'Maestro:config');

        return $this;
    } 
}