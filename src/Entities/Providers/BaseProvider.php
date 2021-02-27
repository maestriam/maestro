<?php

namespace Maestriam\Maestro\Entities\Providers;

use Maestriam\Maestro\Entities\Source;

abstract class BaseProvider extends Source
{     
    /**
     * Sulfixo do nome do arquivo
     */
    protected string $suffix = 'ServiceProvider.php';
}