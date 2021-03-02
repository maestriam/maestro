<?php

namespace Maestriam\Maestro\Entities\Containers;

use Maestriam\Maestro\Entities\Containers\BaseContainer;
use Maestriam\Maestro\Entities\Resources\BlankView;

class ResourceContainer extends BaseContainer
{
    public function view(string $name) : BlankView
    {  
        $module = $this->module();

        $view = new BlankView($module); 

        return $view->setName($name);
    }

    public function init() : ResourceContainer
    {
        $this->view('index')->create();

        return $this;
    }
}