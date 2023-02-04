<?php

namespace Maestriam\Maestro\Foundation\Registers;

use Maestriam\FileSystem\Support\FileSystem;
use Maestriam\Maestro\Exceptions\InvalidPathToRegisterFileException;

abstract class FileRegister
{
    static public function from(string $path)
    {     
        $path = FileSystem::folder($path)->sanitize();
        
        if (! is_dir($path)) {
            throw new InvalidPathToRegisterFileException($path);
        }
        
        foreach (glob($path ."*.php") as $filename)
        { 
            include_once($filename);                
        }
    }
}