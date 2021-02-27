<?php

namespace Maestriam\Maestro\Entities\Config;

use Maestriam\Maestro\Entities\Source;

class ConfigFile extends Source
{
    /**
     * Nome do template
     */
    protected string $template = 'config';

    /**
     * Undocumented function
     *
     * @return array
     */
    protected function getArguments(): array
    {
        return [];
    }

    protected function getFilename(): string
    {
        return 'config.php';
    }
}