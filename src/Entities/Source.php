<?php

namespace Maestriam\Maestro\Entities;

use Maestriam\Forge\Entities\File;
use Maestriam\Forge\Entities\Forge; 
use Illuminate\Support\Facades\Config;
use Maestriam\Maestro\Exceptions\InvalidModuleNameException;

abstract class Source implements Source
{
    /**
     * Define o nome do arquivo que será manipulado
     */
    protected string $filename;

    /**
     * Nome do template
     */
    protected string $template;

    /**
     * Módulo de destino do arquivo de código-fonte
     */
    protected string $module;

    /**
     * Chave de configuração utilizada para Maestriam/Forge
     */
    protected string $setupKey = 'maestro'; 

    /**
     * Instância para criação de arquivos
     */
    private static ?Forge $forgeInstance = null;
 
    /**
     * Define o nome do módulo do arquivo
     *
     * @param string $module
     * @return Source
     */
    public function module(string $module) : Source
    {
        if (! $this->isValidName($module)) {
            throw new InvalidModuleNameException($module);
        }

        $this->module = ucfirst($module);
        return $this;
    }

    /**
     * Define o nome do template que será criado
     *
     * @param string $template
     * @return Source
     */
    protected function template(string $template) : Source
    {
        $this->template = $template;
        return $this;
    }

    /**
     * Verifica se é um nome válido para criação de modulos/arquivos
     *
     * @param string $name
     * @return boolean
     */
    protected function isValidName(string $name) : bool
    {
        return (! strlen(trim($name))) ? false : true;
    }

    /**
     * Retorna as informa
     *
     * @return void
     */
    protected function getConfig() : array
    {
        $config = Config::get('Maestro:forge');
        
        $config = $this->fixRootFolder($config);

        return $config;
    }

    /**
     * Ajusta o caminho de destino para o módulo definido
     *
     * @todo Arrumar uma solução no Maestriam/Forge para resolver isso
     * @param array $config
     * @return array
     */
    private function fixRootFolder(array $config) : array 
    {
        $setup = $config[$this->setupKey];
        $root  = $setup['root_folder'] . DS . $this->module;

        $setup['root_folder'] = $root;        
        
        return [$this->setupKey => $setup];
    }

    /**
     * Retorna a instância do Maestriam/Forge
     *
     * @return Forge
     */
    private function getForge() : Forge
    {
        if (self::$forgeInstance == null) {

            $config = $this->getConfig();
            $key    = $this->setupKey;
            $tpl    = $this->template;

            self::$forgeInstance = new Forge($key, $tpl, $config);
        }

        return self::$forgeInstance;
    }

    /**
     * Executa a criação do arquivo no módulo especificado
     *
     * @param array $args
     * @return void
     */
    protected function createFile(array $args)
    {
        $forge = $this->getForge();

        return $forge->create($this->filename, $args);
    }
}