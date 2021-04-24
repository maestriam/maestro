<?php

namespace Maestriam\Maestro\Entities;

use Illuminate\Support\Facades\Config;
use Maestriam\FileSystem\Foundation\Drive;

class FileDriver
{
    private Drive $drive;

    private string $name;

    private string $key = 'Maestro:forge.maestro.';

    public function __construct(string $name)
    {
        $this->setName($name)
             ->setTemplate()
             ->setRoot()
             ->setPaths()
             ->init();
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

        $this->root = $path . '.' . $this->name;

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
     * Undocumented function
     *
     * @return void
     */
    private function init() : Drive
    {
        $name = $this->driveName();

        $drive = new Drive($name);

        $drive->structure()->root($this->root);
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
        $name = $this->driveName();

        $drive = new Drive($name);

        return ($drive->exists()) ? $drive : $this->init();
    }

    /**
     * Gera um nome para ser inserido no drive
     *
     * @return string
     */
    private function driveName() : string
    {
        return 'drive-' . $this->name;
    }
}