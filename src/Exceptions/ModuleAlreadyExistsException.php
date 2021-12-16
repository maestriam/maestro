<?php

namespace Maestriam\Maestro\Exceptions;

use Exception;

class ModuleAlreadyExistsException extends Exception
{
    public function __construct(string $name)
    {
        
    }    
}