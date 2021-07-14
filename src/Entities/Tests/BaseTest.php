<?php

namespace Maestriam\Maestro\Entities\Tests;

use Maestriam\Maestro\Entities\Source;

abstract class BaseTest extends Source
{    
    /**
     * Nome da classe do controller
     */
    protected string $className;    

    /**
     * Sufixo do nome do arquivo de controller
     */
    protected string $suffix = 'Test.php';

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

    /**
     * Retorna 
     *
     * @return void
     */
    private function breakPath() : array
    {
        return [];
    }
}