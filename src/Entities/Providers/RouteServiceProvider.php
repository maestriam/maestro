<?php

namespace Maestriam\Maestro\Entities\Providers;

class RouteServiceProvider extends BaseProvider 
{
    /**
     * Nome do template
     */
    protected string $template = 'provider.route';

    /**
     * 
     */
    protected string $suffix = 'ServiceProvider.php';

    /**
     * {@inheritDoc}
     */
    protected function getArguments() : array
    {
        return [
            'module' => $this->getModule(),
        ];
    }

    /**
     * Retorna o nome do módulo
     *
     * @return string
     */
    protected function getModule() : string
    {
        return ucfirst($this->module);
    }

    /**
     * Retorna o nome do arquivo 
     *
     * @return string
     */
    protected function getFilename() : string
    {
        return 'Route' . $this->suffix;
    }
}