<?php

namespace Maestriam\Maestro\Entities\Providers;

use Maestriam\Maestro\Entities\Module;

class RouteServiceProvider extends BaseProvider 
{
    public function __construct(Module $module)
    {
        $this->setModule($module)
             ->setTemplate('provider-route');
    }

    /**
     * {@inheritDoc}
     */
    public function placeholders(): array
    {
        return [
            'namespace' => $this->module()->namespace(),
            'module'    => $this->module()->name(),
        ];        
    }

    /**
     * {@inheritDoc}
     */
    public function filename(): string
    {
        return 'Route' . $this->suffix();
    }
}