<?php

namespace Maestriam\Maestro\Entities\Database;

use Maestriam\Maestro\Entities\Module;

class MainMigration extends BaseMigration
{
    public function __construct(Module $module)
    {
        $this->init($module, 'migration-main');
    }

    /**
     * {@inheritDoc}
     */
    public function placeholders() : array
    {
        return [
            'classname' => $this->className()
        ];
    }
}