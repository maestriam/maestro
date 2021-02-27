<?php

namespace Maestriam\Maestro\Concerns;

use Maestriam\Maestro\Entities\Config\ConfigFile;

/**
 * Adiciona poder para definir o nome do modulo
 */
trait ManagesConfigFile
{
    public function configFile() : ConfigFile
    {
        $file = new ConfigFile();
        $name = $this->getModuleName();

        return $file->module($name);
    }
}