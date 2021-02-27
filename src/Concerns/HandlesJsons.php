<?php

namespace Maestriam\Maestro\Concerns;

use Maestriam\Maestro\Entities\Jsons\ComposerJson;
use Maestriam\Maestro\Entities\Jsons\ModuleJson;

trait HandlesJsons
{
    public function moduleJson() : ModuleJson
    {
        $json = new ModuleJson();

        return $json->module($this->moduleName);
    }

    public function composerJson() : ComposerJson
    {
        $json = new ComposerJson();

        return $json->module($this->moduleName);
    }
}