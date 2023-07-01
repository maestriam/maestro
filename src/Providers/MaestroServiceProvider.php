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
use Maestriam\Maestro\Console\CreateSeedCommand;
use Maestriam\Maestro\Console\InstallAdminModuleCommand;
use Maestriam\Maestro\Console\SeedCommand;
use Maestriam\Maestro\Console\PublishModuleCommand;
use Maestriam\Maestro\Console\SetAutoloadCommand;
use Maestriam\Maestro\Console\SetFakeDatabaseCommand;
use Maestriam\Maestro\Console\StartConfigurationCommand;

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
        $this->registerNamespaces();
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
        $this->registerServices();
        $this->setupStubPath();
        $this->registerProviders();
        $this->registerNamespaces();
        $this->app->register(RegisterConfigServiceProvider::class);
    }

    /**
     * Configura o pacote auxiliar laravel-modules 
     *
     * @return void
     */
    protected function registerNamespaces() : self
    {
        $config = __DIR__ . '/../Config/modules.php';
        $this->mergeConfigFrom($config, 'modules');

        return $this;
    }

    /**
     * Disponibiliza o Facade do projeto para o usuário
     *
     * @return void
     */
    protected function registerFacade() : self
    {
        $this->app->bind('maestro',function() {
            return new Maestro($this->app);
        });   
        
        return $this;
    }

    /**
     * Registra todos os comandos disponíveis 
     *
     * @return void
     */
    private function registerCommands() : self
    {
        $this->commands([
            CreateControllerCommand::class,
            CreateModuleCommand::class,
            CreateViewCommand::class,
            CreateServiceProviderCommand::class,
            CreateSeedCommand::class,
            CreateModelCommand::class,
            CreateMigrationCommand::class,
            MigrateCommand::class,
            MigrateRollbackCommand::class,
            SeedCommand::class,
            PublishModuleCommand::class,
            SetAutoloadCommand::class,
            SetFakeDatabaseCommand::class,
            StartConfigurationCommand::class,
            InstallAdminModuleCommand::class
        ]);

        return $this;
    }

    /**
     * Registra as constantes utilizadas no pacote
     *
     * @return MaestroServiceProvider
     */
    private function registerConsts() : MaestroServiceProvider
    {        
        if (! defined('DS')) {
            define('DS', DIRECTORY_SEPARATOR);
        }

        return $this;
    }
}