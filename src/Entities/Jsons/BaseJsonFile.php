<?php

namespace Maestriam\Maestro\Entities\Jsons;

use Maestriam\Maestro\Entities\Module;
use Maestriam\Maestro\Entities\Source;

abstract class BaseJsonFile extends Source
{ 
    /**
     * {@inheritDoc}
     */
    public function filename() : string
    {
        return $this->filename;
    }
}