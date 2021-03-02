<?php

namespace Maestriam\Maestro\Entities\Jsons;

use Maestriam\Maestro\Entities\Module;
use Maestriam\Maestro\Entities\Source;

class ModuleJson extends Source 
{
    public function __construct(Module $module)
    {
        $this
            ->init($module, 'json-module')
            ->setFilename('module.json');
    }

    public function placeholders(): array
    {
        return [
            'namespace' => $this->module()->namespace(true),
            'name'      => $this->module()->name(),
            'alias'     => $this->module()->lcname()
        ];
    }
}