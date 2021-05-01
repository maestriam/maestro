<?php

namespace Maestriam\Maestro\Providers;

use Maestriam\Maestro\Entities\Maestro;
use Nwidart\Modules\LaravelModulesServiceProvider;
use Maestriam\Maestro\Console\MigrateCommand;
use Maestriam\Maestro\Console\MigrateRollbackCommand;
use Maestriam\Maestro\Console\CreateViewCommand;
use Maestriam\Maestro\Console\CreateModelCommand;
use Maestriam\Maestro\Console\CreateModuleCommand;
use Maestriam\Maestro\Console\CreateControllerCommand;
use Maestriam\Maestro\Console\CreateMigrationCommand;
use Maestriam\Maestro\Console\CreateServiceProviderCommand;

class MaestroServiceProvider extends LaravelModulesServiceProvider
{
    /**
     * Ao iniciar o carregamento do projeto...
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        $this->registerConsts();
        $this->registerCommands();
        $this->registerFacade();    
    }

    /**
     * Registra os services providers auxiliares
     *
     * @return void
     */
    public function register()
    {
        parent::register();
        $this->app->register(RegisterConfigServiceProvider::class);
    }

    /**
     * Configura o pacote auxiliar laravel-modules 
     *
     * @return void
     */
    protected function registerNamespaces()
    {
        $config = __DIR__ . '/../Config/modules.php';

        $this->mergeConfigFrom($config, 'modules');

        // dd(confi);

    }

    /**
     * Disponibiliza o Facade do projeto para o usuário
     *
     * @return void
     */
    protected function registerFacade()
    {
        $this->app->bind('maestro',function() {
            return new Maestro($this->app);
        });          
    }

    /**
     * Registra todos os comandos disponíveis 
     *
     * @return void
     */
    private function registerCommands()
    {
        $this->commands([
            CreateControllerCommand::class,
            CreateModuleCommand::class,
            CreateViewCommand::class,
            CreateServiceProviderCommand::class,
            CreateModelCommand::class,
            CreateMigrationCommand::class,
            MigrateCommand::class,
            MigrateRollbackCommand::class
        ]);
    }

    /**
     * Registra as constantes utilizadas no pacote
     *
     * @return void
     */
    private function registerConsts()
    {        
        if (! defined('DS')) {
            define('DS', DIRECTORY_SEPARATOR);
        }
    }
}