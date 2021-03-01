<?php

namespace Maestriam\Maestro\Entities\Containers;

use Maestriam\Maestro\Entities\Containers\BaseContainer;
use Maestriam\Maestro\Entities\Controllers\MainController;
use Maestriam\Maestro\Entities\Controllers\BlankController;

class ControllerContainer extends BaseContainer
{
    /**
     * Retorna a instância de um controller main
     *
     * @return MainController
     */
    public function main() : MainController
    {
        $module = $this->module();

        return new MainController($module);
    }
    
    /**
     * Retorna a instância de um controller em branco
     *
     * @param string $name
     * @return BlankController
     */
    public function blank(string $name) : BlankController
    {
        $module = $this->module();

        $controller = new BlankController($module);

        return $controller->setClassName($name);   
    }
}