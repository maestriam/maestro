<?php

namespace Maestriam\Maestro\Entities\Jsons;

use Maestriam\Maestro\Entities\Source;

abstract class BaseJsonFile extends Source
{ 
    /**
     * Retorna o namespace 
     *
     * @return string
     */   
    protected function getNamespace() : string
    {
        $vendor = ucfirst($this->vendor);
        $module = ucfirst($this->module);

        return sprintf('%s\\\\%s\\\\', $vendor, $module);
    }
}