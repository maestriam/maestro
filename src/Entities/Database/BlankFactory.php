<?php

namespace Maestriam\Maestro\Entities\Database;

use Maestriam\Maestro\Entities\Module;
use Maestriam\Maestro\Entities\Source;

class BlankFactory extends Source
{
    private string $className;

    public function __construct(Module $module)
    {
        $this->init($module, 'factory-blank');
    }

    public function placeholders() : array
    {
        return [
            'namespace' => $this->module()->namespace(),
            'classname' => $this->className()
        ];
    }

    public function setClassName(string $name)
    {
        $this->className = ucfirst($name);
        return $this;
    }

    public function className() : string
    {
        return $this->className;
    }

    public function filename(): string
    {
        return $this->className() . 'Factory.php'; 
    }
}