<?php

namespace Maestriam\Maestro\Entities\Jsons;

use Illuminate\Support\Facades\Config;
use Maestriam\Maestro\Entities\Json;

class ModuleJson extends BaseJsonFile 
{
    /**
     * Nome do template
     */
    protected string $template = 'json.module';

    /**
     * {@inheritDoc}
     */
    protected function getArguments() : array
    {
        return [
            'name'      => $this->getName(),
            'alias'     => $this->getAlias(),
            'namespace' => $this->getNamespace()
        ];
    }

    /**
     * Retorna o nome do atalho do módulo
     *
     * @return string
     */
    protected function getAlias() : string
    {
        return strtolower($this->module);
    }

    /**
     * Retorna o nome do modulo 
     *
     * @return string
     */
    protected function getName() : string 
    {
        return ucfirst($this->module);
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     */
    protected function getFilename() : string
    {
        return 'module.json';
    }
}