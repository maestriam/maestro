<?php

namespace Maestriam\Maestro\Providers;

use Illuminate\Support\ServiceProvider;

class MaestroServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerConfs();
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
        $config = (is_file($published)) ? $published : $source;

        $this->mergeConfigFrom($forge, 'Maestro:forge');
        $this->mergeConfigFrom($config,'Maestro:config');

        return $this;
    }
}