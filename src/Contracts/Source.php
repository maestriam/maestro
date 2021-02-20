<?php

namespace Maestriam\Maestro\Contracts;

interface Source
{
    public function getArguments() : array; 

    public function create();
}