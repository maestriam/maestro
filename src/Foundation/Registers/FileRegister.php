<?php

namespace Maestriam\Maestro\Foundation\Registers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;

abstract class FileRegister
{
    static public function from(string $path)
    {                
        
        foreach (glob($path ."*.php") as $filename)
        { 
            include($filename);                
        }
    }
}