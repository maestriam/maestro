<?php

namespace Maestriam\Maestro\Entities\Routes;

use Maestriam\Maestro\Entities\Module;
use Maestriam\Maestro\Entities\Source;

class WebRoute extends Source
{
    public function __construct(Module $module)
    {
        $this->setModule($module)
             ->setFilename('web.php')
             ->setTemplate('route-web');
    }

    /**
     * {@inheritDoc}
     */
    public function placeholders(): array
    {
        return [
            'namespace'  => $this->module()->namespace(),
            'module'     => $this->module()->lcname(),
            'controller' => $this->getController(),
            'function'   => $this->getFunction(),
        ];        
    }

    /**
     * Retorna o nome do controller principal
     *
     * @return string
     */
    protected function getController() : string
    {
        return $this->module()->name() . 'Controller';
    }

    /**
     * Retorna o nome da função do controller
     *
     * @return string
     */
    protected function getFunction() : string
    {
        return 'index';
    }
}