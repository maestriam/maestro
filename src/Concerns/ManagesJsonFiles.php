<?php

namespace Maestriam\Maestro\Concerns;

use Maestriam\Maestro\Entities\Containers\JsonFilesContainer;

trait HandlesJsons
{

    public function json() : JsonFilesContainer
    {
        $json = new JsonFilesContainer();

        return $json->module($this->moduleName);
    }
}