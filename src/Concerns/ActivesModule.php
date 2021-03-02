<?php

namespace Maestriam\Maestro\Concerns;

use Nwidart\Modules\Activators\FileActivator;

/**
 * 
 */
trait ActivesModule
{
    public function active() : void
    {        
        $name = $this->name();
     
        $activator = new FileActivator($this->app);
        
        $activator->setActiveByName($name, true);
    }    
}

