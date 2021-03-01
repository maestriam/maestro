<?php

namespace Maestriam\Maestro\Entities\Providers;

use Maestriam\Maestro\Entities\Module;
use Maestriam\Maestro\Exceptions\InvalidSourceFilenameException;

class BlankServiceProvider extends BaseProvider 
{    
    /**
     * Nome da classe do service provider
     */
    private string $className;

    public function __construct(Module $module)
    {
        $this->setModule($module)
             ->setTemplate('provider-blank');
    }

    /**
     * {@inheritDoc}
     */
    public function placeholders(): array
    {
        return [
            'classname' => $this->className(),
            'namespace' => $this->module()->namespace(),
        ];
    }
    
    /**
     * Define o nome da classe
     *
     * @param string $name
     * @return BlankServiceProvider
     */ 
    public function setClassName(string $name) : BlankServiceProvider
    {
        $this->className = ucfirst($name);
        return $this;
    }

    /**
     * Retorna o nome da classe
     *
     * @return string
     */
    public function className() : string
    {
        return $this->className;
    }

    /**
     * {@inheritDoc}
     */
    public function filename(): string
    {
        return $this->className() . $this->suffix();
    }
}