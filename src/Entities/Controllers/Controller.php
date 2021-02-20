<?php

namespace Maestriam\Maestro\Entities\Controllers;

use Maestriam\Maestro\Entities\Source;

abstract class Controller extends Source
{    
    /**
     * Executa a criação do controller em um determinado módulo
     *
     * @return void
     */
    public function create()
    {
        $args = $this->getArguments();

        return $this->createFile($args);
    }    

    /**
     * Define o nome da classe do controller
     *
     * @param string $name
     * @return Controller
     */
    protected function setName(string $name) : Controller
    {
        $this->name = ucfirst($name);
        return $this;
    }

    /**
     * Define do arquivo do controller
     *
     * @param string $name
     * @return Controller
     */
    protected function setFilename(string $name) : Controller
    {
        $this->filename = ucfirst($name) . 'Controller.php';
        return $this;
    }

    /**
     * Retorna o namespace da classe
     *
     * @return string
     */
    protected function getNamespace() : string
    {
        return "Modules\\{$this->module}";
    }

    /**
     * Retorna todos os valores que serão substituídos na 
     * hora da criação do arquivo.
     *
     * @return array
     */
    abstract protected function getArguments() : array;
}