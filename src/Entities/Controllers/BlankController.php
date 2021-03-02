<?php

namespace Maestriam\Maestro\Entities\Controllers;

use Maestriam\Maestro\Entities\Module;
use Maestriam\Maestro\Exceptions\InvalidSourceFilenameException;

class BlankController extends BaseController 
{
   /**
    * Classe de controller 
    *
    * @param Module $module
    */ 
    public function __construct(Module $module)
    {
        $this->init($module, 'controller-blank');
    }


    /**
     * Define o nome da classe e do arquivo do controller. 
     *
     * @param string $name
     * @return Controller
     */
    public function setClassName(string $name) : BaseController
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