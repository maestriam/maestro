<?php

namespace Maestriam\Maestro\Entities\Containers;

use Illuminate\Container\Container;
use Maestriam\Maestro\Entities\Module;
use Maestriam\FileSystem\Support\FileSystem;

class ModuleContainer
{  
    private Container $app;

    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    public function all() : array
    {
        $modules = [];

        $path = config('Maestro:forge.maestro.root_folder');

        $folders = FileSystem::folder($path)->read(1);

        foreach ($folders as $folder) {
            
            $module = new Module($folder, $this->app);

            $modules[] = $module;
        }

        return $modules;
    }    
}