<?php

namespace Maestriam\Maestro\Entities\Routes;

use Maestriam\Maestro\Entities\Module;
use Maestriam\Maestro\Entities\Source;

class ApiRoute extends Source
{
    public function __construct(Module $module)
    {
        $this->setModule($module)
             ->setFilename('api.php')
             ->setTemplate('route-api');
    }

    /**
     * {@inheritDoc}
     */
    public function placeholders(): array
    {
        return [
            'module' => $this->module()->lcname(),
        ];        
    }
}