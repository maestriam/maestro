<?php

namespace Maestriam\Maestro\Support;

use Illuminate\Support\Facades\Facade;

class Maestro extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'maestro';
    }
}