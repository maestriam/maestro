<?php

namespace Maestriam\Maestro\Concerns;

use Maestriam\Maestro\Exceptions\InvalidModuleNameException;

/**
 * Adiciona poder para definir o nome do modulo
 */
trait HasModuleAttribute
{
    /**
     * Nome do módulo
     */
    protected string $moduleName;

    /**
     * Define o nome do módulo
     *
     * @param string $name
     * @return self
     */
    public final function module(string $name) : self
    {
        if (! $this->moduleNameIsValid($name)) {
            throw new InvalidModuleNameException($name);            
        }

        $this->moduleName = $name;

        return $this;
    }

    /**
     * Retorna o nome do módulo
     *
     * @return string
     */
    protected function getModuleName() : string
    {
        return $this->moduleName;
    }

    /**
     * Verifica se é um nome para módulo válido
     *
     * @param string $name
     * @return boolean
     */
    protected function moduleNameIsValid(string $name) : bool
    {
        return true;
    }    
}
