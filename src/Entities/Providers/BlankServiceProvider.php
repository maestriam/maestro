<?php

namespace Maestriam\Maestro\Entities\Providers;

use Maestriam\Maestro\Exceptions\InvalidSourceFilenameException;

class BlankServiceProvider extends BaseProvider 
{
    /**
     * Nome do template
     */
    protected string $template = 'provider.blank';

    /**
     * Nome da classe do service provider
     */
    private string $name;

    /**
     * Define o nome da classe e do arquivo do service provider. 
     *
     * @param string $name
     * @return Controller
     */
    public function name(string $name) : self
    {
        if (! $this->isValidName($name)) {
            throw new InvalidSourceFilenameException($name);            
        }

        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    protected function getArguments() : array
    {
        return [
            'namespace' => $this->getNamespace(),
            'classname' => $this->getClassName(),
        ];
    }

    /**
     * Retorna o nome do modulo 
     *
     * @return string
     */
    protected function getNamespace() : string 
    {
        $vendor = ucfirst($this->vendor);
        $module = ucfirst($this->module);
        
        return sprintf("%s\\%s", $vendor, $module);
    }

    /**
     * Retorna o nome da classe
     *
     * @return string
     */
    protected function getClassName() : string
    {
        return ucfirst($this->name);
    }

    /**
     * Retorna o nome do arquivo 
     *
     * @return string
     */
    protected function getFilename() : string
    {
        return ucfirst($this->name) . $this->suffix;
    }
}