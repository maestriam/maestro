<?php

namespace Maestriam\Maestro\Entities\Tests;

use Maestriam\Maestro\Entities\Module;

class UnitTest extends BaseTest 
{
   /**
    * Classe de controller 
    *
    * @param Module $module
    */ 
    public function __construct(Module $module)
    {
        $this->init($module, 'test-unit');
    }


    /**
     * Define o nome da classe e do arquivo do controller. 
     *
     * @param string $name
     * @return Controller
     */
    public function setClassName(string $name) : BaseTest
    {
        $this->className = $name;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function placeholders(): array
    {        
        return [
            'namespace' => $this->module()->namespace(),
            'classname' => $this->className()
        ];        
    }
}