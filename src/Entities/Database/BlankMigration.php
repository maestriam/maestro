<?php

namespace Maestriam\Maestro\Entities\Database;

use Maestriam\Maestro\Entities\Module;

class BlankMigration extends BaseMigration
{
    private string $className;

    public function __construct(Module $module)
    {
        $this->init($module, 'migration-blank');
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