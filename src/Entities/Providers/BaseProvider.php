<?php

namespace Maestriam\Maestro\Entities\Providers;

use Maestriam\Maestro\Entities\Source;

abstract class BaseProvider extends Source
{     
    /**
     * Sulfixo do nome do arquivo
     */
    private string $suffixName = 'ServiceProvider.php';


    /**
     * Retorna o sufixo do arquivo
     *
     * @return string
     */
    protected function suffix() : string
    {
        return $this->suffixName;
    }
}