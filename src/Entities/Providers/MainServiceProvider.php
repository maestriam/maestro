<?php

namespace Maestriam\Maestro\Entities\Providers;

use Maestriam\Maestro\Entities\Module;

class MainServiceProvider extends BaseProvider 
{
    public function __construct(Module $module)
    {
        $this->setModule($module)
             ->setTemplate('provider-main');
    }

    /**
     * {@inheritDoc}
     */
    public function placeholders() : array
    {
        return [
            'lowername' => $this->module()->lcname(),
            'uppername' => $this->module()->name(),
            'namespace' => $this->module()->namespace()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function filename(): string
    {
        return $this->module()->name() . $this->suffix();
    }
}