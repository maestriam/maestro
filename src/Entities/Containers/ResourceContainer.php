<?php

namespace Maestriam\Maestro\Entities\Containers;

use Maestriam\Maestro\Entities\Containers\BaseContainer;
use Maestriam\Maestro\Entities\Resources\BlankView;

class ResourceContainer extends BaseContainer
{
    public function blank(string $name) : BlankView
    {  
        $view = new BlankView();
        $module = $this->getModuleName();

        return $view->name($name)->module($module);
    }
}