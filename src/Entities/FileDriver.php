<?php

namespace Maestriam\Maestro\Entities;

use Illuminate\Support\Facades\Config;
use Maestriam\FileSystem\Foundation\Drive;
use Maestriam\FileSystem\Support\FileSystem;

class FileDriver
{
    private string $name;

    private string $key = 'Maestro:forge.maestro.';

    public function __construct(string $name = null)
    {
        $this->setName($name);
        $this->setTemplate();
        $this->setRoot();
        $this->setPaths();
        $this->init();
    }

    /**
     * Define o nome do drive
     *
     * @param string $name
     * @return Drive
     */
    private function setName(string $name) : FileDriver
    {
        $this->name = strtolower($name);

        return $this;
    }

    /**
     * Define o caminho onde está os arquivos de templates do projeto
     *
     * @return Drive
     */
    private function setTemplate() : FileDriver
    {
        $this->template = $this->config('template_folder');

        return $this;
    }

    /**
     * Define o caminho onde está será 
     *
     * @return Drive
     */
    private function setRoot() : FileDriver
    {
        $path = $this->config('root_folder');
        
        $this->root = $path . DS . ucfirst($this->name) . DS;

        return $this;
    }

    /**
     * Define os subdiretórios dinamicos, de acordo com o tipo de template
     *
     * @return Drive
     */
    private function setPaths() : FileDriver
    {
        $this->paths = $this->config('structure');

        return $this;
    }

    /**
     * Retorna propriedades do arquivo de configuração
     *
     * @param string $name
     * @return string
     */
    private function config(string $name) : string|array
    {
        $config = $this->key . $name;
        
        return Config::get($config);
    }

    /**
     * Inicia um novo drive para o módulo
     *
     * @return void
     */
    private function init() : Drive
    {
        $name = $this->generateName();

        $drive = FileSystem::drive($name);

        $drive->structure()->root($this->rootPath());
        $drive->structure()->paths($this->paths);
        $drive->structure()->template($this->template);

        $drive->save();

        return $drive;
    }

    /**
     * Retorna a instância de drive
     *
     * @return Drive
     */
    public function get() : Drive
    {
        $name = $this->generateName();

        $drive = FileSystem::drive($name);

        return ($drive->exists()) ? $drive : $this->init();
    }

    /**
     * Retorna o caminho da raíz do módulo
     *
     * @return string
     */
    public function rootPath() : string 
    {
        return $this->root;
    }

    /**
     * Retorna o caminho dos arquivos de migration do módulo
     *
     * @return string
     */
    public function migrationPath() : string
    {
        return $this->generatePath('folders.migration');        
    }

    /**
     * Retorna o caminho dos arquivos de seeds do módulo
     *
     * @return string
     */
    public function seedPath() : string 
    {                                   
        return $this->generatePath('folders.seeder');
    }

    public function assetsPath() : string
    {
        return $this->generatePath('folders.assets');
    }
    
    /**
     * Gera o caminho de a
     * 
     * @TODO Verificar como corrigir generatePath. Ocorrencia
     * @param string $configKey
     * @return string
     */
    private function generatePath(string $configKey) : string
    {
        $sub = $this->config($configKey);

        $base = str_replace(base_path(), '', $this->rootPath());

        $path = str_replace(DS, '/', $base . $sub);
        
        return FileSystem::folder($path)->sanitize();
    }

    /**
     * Gera um nome para ser inserido no drive
     *
     * @return string
     */
    private function generateName() : string
    {
        return 'drive-' . $this->name;
    }
}