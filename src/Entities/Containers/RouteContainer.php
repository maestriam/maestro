<?php

namespace Maestriam\Maestro\Entities\Containers;

use Maestriam\Maestro\Entities\Containers\BaseContainer;
use Maestriam\Maestro\Entities\Routes\WebRoute;

class RouteContainer extends BaseContainer
{
    public function web() : WebRoute
    {  
        $module = $this->module();

        return new WebRoute($module);
    }
}