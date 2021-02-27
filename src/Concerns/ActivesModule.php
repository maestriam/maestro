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
        $activator = new FileActivator($this->app);
        
        $name = $this->getModuleName();

        $activator->setActiveByName($name, true);
    }    
}

