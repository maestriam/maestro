<?php

namespace Maestriam\Maestro\Entities\Controllers;

use Maestriam\Maestro\Entities\Source;

abstract class BaseController extends Source
{    
    /**
     * Nome da classe do controller
     */
    protected string $className;    

    /**
     * Sufixo do nome do arquivo de controller
     */
    protected string $suffix = 'Controller.php';

    /**
     * Retorna o nome da classe
     *
     * @return string
     */
    public function className() : string
    {
        return ucfirst($this->className);
    }

    /**
     * {@inheritDoc}
     */
    public function filename() : string
    {
        return $this->className() . $this->suffix;        
    }    
}