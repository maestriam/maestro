<?php

namespace Maestriam\Maestro\Providers;

use Illuminate\Support\ServiceProvider;

class RegisterConfigServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->registerConfs();
    }

    /**
     * Undocumented function
     *
     * @return string
     */
    private function getForgeConfig() : string
    {
        return __DIR__.'/../Config/forge.php';
    }

    /**
     * Undocumented function
     *
     * @return string
     */
    private function getMaestroConfig() : string
    {
        $source    = __DIR__.'/../Config/config.php';
        $published = config_path('config.php');

        $this->publishes([$source => $published], 'Maestro'); 
        
        return (is_file($published)) ? $published : $source;          
    }

    /**
     * Registra as configurações do pacote
     *
     * @return ForgeServiceProvider
     */    
    private function registerConfs() : RegisterConfigServiceProvider
    {              
        $forge   = $this->getForgeConfig();
        $maestro = $this->getMaestroConfig();

        $this->mergeConfigFrom($forge,  'Maestro:forge');
        $this->mergeConfigFrom($maestro,'Maestro:config');

        return $this;
    } 

}