<?php

namespace Maestriam\Maestro\Concerns;

use Maestriam\Maestro\Entities\Config\ConfigFile;
use Maestriam\Maestro\Entities\Containers\ControllerContainer;
use Maestriam\Maestro\Entities\Containers\JsonFilesContainer;
use Maestriam\Maestro\Entities\Containers\ProviderContainer;
use Maestriam\Maestro\Entities\Containers\ResourceContainer;
use Maestriam\Maestro\Entities\Containers\RouteContainer;

/**
 * Adiciona poder para definir o nome do modulo
 */
trait ManagesContainers
{
    /**
     * Retorna a instância para manipulação de arquivo de configuração
     *
     * @return \Maestriam\Maestro\Entities\Containers\ConfigFile
     */
    public function configFile() : ConfigFile
    {
        return new ConfigFile($this);
    }

    /**
     * Retorna a instância para manipulação de controller
     *
     * @return \Maestriam\Maestro\Entities\Containers\ControllerContainer
     */
    public function controller() : ControllerContainer
    {
        return new ControllerContainer($this);
    } 

    /**
     * Retorna a instância para manipulação de arquivos Json
     *     
     * @return \Maestriam\Maestro\Entities\Containers\JsonFilesContainer
     */
    public function json() : JsonFilesContainer
    {
        return new JsonFilesContainer($this);
    }

    /**
     * Retorna a instância de controle dos service providers
     *
     * @return \Maestriam\Maestro\Entities\Containers\ProviderContainer
     */
    public function provider() : ProviderContainer
    {
        return new ProviderContainer($this);
    } 

    /**
     * Retorna a instância de controle de resources
     *
     * @return \Maestriam\Maestro\Entities\Containers\ResourceContainer
     */
    public function view() : ResourceContainer
    {
        return new ResourceContainer($this);
    }  

    /**
     * Retorna a instância de controle de rotas
     *
     * @return \Maestriam\Maestro\Entities\Containers\RouteContainer
     */
    public function route() : RouteContainer
    {
        return new RouteContainer($this);
    }
}