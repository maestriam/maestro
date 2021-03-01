<?php

namespace Maestriam\Maestro\Entities\Jsons;

use Illuminate\Support\Facades\Config;
use Maestriam\Maestro\Entities\Module;
use Maestriam\Maestro\Entities\Source;

class ComposerJson extends Source 
{
    public function __construct(Module $module)
    {
        $this
            ->setModule($module)
            ->setTemplate('json-composer')
            ->setFilename('composer.json');
    }

    /**
     * {@inheritDoc}
     */
    public function placeholders() : array
    {
        return [
            'name'      => $this->module()->lcname(),
            'namespace' => $this->module()->namespace(true),
            'author'    => $this->getAuthor(),
            'email'     => $this->getEmail(),
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
}