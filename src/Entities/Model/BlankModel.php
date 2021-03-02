<?php

namespace Maestriam\Maestro\Entities\Model;

use Maestriam\Maestro\Entities\Module;
use Maestriam\Maestro\Entities\Source;

class BlankModel extends Source
{
    public function __construct(Module $module)
    {
        $this->init($module, 'model-blank');
    }

    /**
     * {@inheritDoc}
     */
    public function placeholders() : array
    {
        return [
            'namespace' => $this->module()->namespace(),
            'classname' => $this->className()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function filename() : string
    {
        return $this->className() . '.php';
    }

    /**
     * Define o nome do model
     *
     * @param string $name
     * @return void
     */
    public function setClassName(string $name) : BlankModel
    {
        $this->className = ucfirst($name);
        return $this;
    }

    /**
     * Retorna o nome do model
     *
     * @return string
     */
    public function className() : string
    {
        return $this->className;
    }
}