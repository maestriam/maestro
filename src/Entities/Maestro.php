<?php

namespace Maestriam\Maestro\Entities;

use Illuminate\Container\Container;
use Maestriam\Maestro\Entities\Containers\ModuleContainer;

class Maestro
{
    private Container $app;

    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    public function module(string $name) : Module
    {
        return new Module($name, $this->app);
    }

    public function modules() : ModuleContainer
    {
        return new ModuleContainer($this->app);
    }
}