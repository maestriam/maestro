<?php

namespace Maestriam\Maestro\Entities\Jsons;

use Illuminate\Support\Facades\Config;

class ComposerJson extends BaseJsonFile 
{
    /**
     * Nome do template
     */
    protected string $template = 'json.composer';

    /**
     * {@inheritDoc}
     */
    protected function getArguments() : array
    {
        return [
            'name'      => $this->getName(),
            'author'    => $this->getAuthor(),
            'email'     => $this->getEmail(),
            'namespace' => $this->getNamespace()
        ];
    }

    /**
     * Retorna o nome do autor do módulo
     *
     * @return string
     */
    private function getAuthor() : string 
    {
        return Config::get('Maestro:config.author.name');
    }

    /**
     * Retorna o e-mail do autor
     *
     * @return string
     */
    private function getEmail() : string 
    {
        return Config::get('Maestro:config.author.email');
    }

    /**
     * Retorna o nome do modulo 
     *
     * @return string
     */
    protected function getName() : string 
    {
        return strtolower($this->module);
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     */
    protected function getFilename() : string
    {
        return 'composer.json';
    }
}