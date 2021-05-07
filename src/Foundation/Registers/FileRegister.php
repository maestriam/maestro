<?php

namespace Maestriam\Maestro\Foundation\Registers;

use Maestriam\Maestro\Exceptions\InvalidPathToRegisterFileException;

abstract class FileRegister
{
    static public function from(string $path)
    {        
        if (! is_dir($path)) {
            throw new InvalidPathToRegisterFileException($path);
        }
        
        foreach (glob($path ."*.php") as $filename)
        { 
            include_once($filename);                
        }
    }
}