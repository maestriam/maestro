<?php

namespace Maestriam\Maestro\Entities\Controllers;

use Maestriam\Maestro\Entities\Source;

abstract class BaseController extends Source
{    
    /**
     * Nome da classe do controller
     */
    protected string $name;    

    /**
     * Sufixo do nome do arquivo de controller
     */
    protected string $suffix = 'Controller.php';

    /**
     * Define o nome da classe do controller
     *
     * @param string $name
     * @return Controller
     */
    protected function setName(string $name) : self
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
    protected function getFilename() : string
    {
        return ucfirst($this->name) . $this->suffix;        
    }

    /**
     * Retorna o namespace da classe
     *
     * @return string
     */
    protected function getNamespace() : string
    {
        return ucfirst($this->vendor) ."\\". ucfirst($this->module);
    }
}