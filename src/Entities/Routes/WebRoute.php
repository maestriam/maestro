<?php

namespace Maestriam\Maestro\Entities\Routes;

use Maestriam\Maestro\Entities\Source;

class WebRoute extends Source
{
    protected string $template = 'route.web';

    protected function getArguments() : array
    {
        return [
            'module'     => $this->getModule(),
            'controller' => $this->getController(),
            'namespace'  => $this->getNamespace(),
            'function'   => $this->getFunction(),
        ];
    } 

    protected function getController() : string
    {
        return ucfirst($this->module) . 'Controller';
    }

    protected function getModule() : string
    {
        return strtolower($this->module);
    }

    protected function getFilename() : string
    {
        return 'web.php';   
    }

    protected function getFunction() : string
    {
        return 'index';
    }

    protected function getNamespace() : string
    {
        return ucfirst($this->vendor) . '\\' . ucfirst($this->module);
    }
}