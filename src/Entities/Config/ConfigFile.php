<?php

namespace Maestriam\Maestro\Entities\Config;

use Maestriam\Maestro\Entities\Module;
use Maestriam\Maestro\Entities\Source;

class ConfigFile extends Source
{
    public function __construct(Module $module)
    {
        $this->setModule($module)
             ->setTemplate('file-config');
    }

    /**
     * {@inheritDoc}
     */
    public function placeholders(): array
    {
        return [];
    }

    /**
     * {@inheritDoc}
     */
    public function filename(): string
    {
        return 'config.php';        
    }
}