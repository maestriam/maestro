<?php

namespace Maestriam\Maestro\Entities\Containers;

use Maestriam\Maestro\Entities\Containers\BaseContainer;
use Maestriam\Maestro\Entities\Controllers\MainController;
use Maestriam\Maestro\Entities\Controllers\BlankController;

class ControllerContainer extends BaseContainer
{
    /**
     * Container gerenciador das instância de controller
     *
     * @param string $module
     */
    public function __construct(string $module)
    {
        $this->module($module);
    }

    /**
     * Retorna a instância de um controller main
     *
     * @return MainController
     */
    public function main() : MainController
    {
        $controller = new MainController();
        $moduleName = $this->getModuleName();
        
        return $controller->module($moduleName);
    }
    
    /**
     * Retorna a instância de um controller em branco
     *
     * @param string $name
     * @return BlankController
     */
    public function blank(string $name) : BlankController
    {
        $controller = new BlankController();
        $moduleName = $this->getModuleName();
        
        return $controller->name($name)
                          ->module($moduleName);
    }
}