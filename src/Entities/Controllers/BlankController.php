<?php

namespace Maestriam\Maestro\Entities\Controllers;

use Maestriam\Maestro\Exceptions\InvalidSourceFilenameException;

class BlankController extends BaseController 
{
    /**
     * Nome do template
     */
    protected string $template = 'controller.blank';

    /**
     * Define o nome da classe e do arquivo do controller. 
     *
     * @param string $name
     * @return Controller
     */
    public function name(string $name) : self
    {
        if (! $this->isValidName($name)) {
            throw new InvalidSourceFilenameException($name);            
        }

        return $this->setName($name);
    }

    /**
     * {@inheritDoc}
     */
    protected function getArguments() : array
    {
        $namespace = $this->getNamespace();

        return [
            'namespace' => $namespace,
            'classname' => $this->name
        ];
    }
}