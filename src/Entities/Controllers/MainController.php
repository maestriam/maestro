<?php

namespace Maestriam\Maestro\Entities\Controllers;

use Maestriam\Maestro\Entities\Controllers\BaseController;
class MainController extends BaseController
{
    /**
     * Nome do template
     */
    protected string $template = 'controller.main';

    /**
     * Nome da classe
     */
    protected string $name = 'Main';

    /**
     * {@inheritDoc}
     */
    protected function getArguments(): array
    {
        return [
            'classname'  => $this->getName(),
            'namespace'  => $this->getNamespace(),
            'modulename' => strtolower($this->module),
        ];
    }

    /**
     * Retorna o nome do controller
     *
     * @return string
     */
    protected function getName() : string
    {
        return ucfirst($this->module);
    }

    /**
     * Retorna o nome do arquivo
     *
     * @return string
     */
    protected function getFilename(): string
    {
        return $this->getName() . $this->suffix;
    }

}