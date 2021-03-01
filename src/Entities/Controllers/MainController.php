<?php

namespace Maestriam\Maestro\Entities\Controllers;

use Maestriam\Maestro\Entities\Controllers\BaseController;
use Maestriam\Maestro\Entities\Module;

class MainController extends BaseController
{
    /**
    * Classe de controller 
    *
    * @param Module $module
    */ 
    public function __construct(Module $module)
    {
        $this->setClassName('Main')
             ->setTemplate('controller.main')
             ->setModule($module);
    }

    /**
     * {@inheritDoc}
     */
    public function placeholders(): array
    {
        return [
            'classname'  => $this->className(),
            'namespace'  => $this->module()->namespace(),
            'modulename' => $this->module()->lcname(),
        ];        
    }


    /**
     * Define o nome da classe e do arquivo do controller. 
     *
     * @param string $name
     * @return Controller
     */
    protected function setClassName(string $name) : MainController
    {
        $this->className = $name;
        return $this;
    }
}