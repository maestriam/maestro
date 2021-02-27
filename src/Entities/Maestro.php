<?php

namespace Maestriam\Maestro\Entities;

use Illuminate\Container\Container;

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
}