<?php

namespace Maestriam\Maestro\Entities;

use Maestriam\Maestro\Contracts\SourceInterface;

abstract class Source implements SourceInterface
{
    /**
     * Nome do arquivo
     */
    protected string $filename;

    /**
     * Nome do template
     */
    protected string $template;    

    /**
     * Módulo de destino do arquivo de código-fonte
     */
    protected Module $module;

    /**
     * Gabarito com as informações do template
     */
    protected array $placeholders;

    /**
     * Undocumented function
     *
     * @param Module $module
     */
    public function __construct(Module $module)
    {
        $this->setModule($module);
    }

    /**
     * Define as propriedades principais ao iniciar o objeto
     * de manipulação de código
     *
     * @param Module $module
     * @param string $template
     * @return Source
     */
    public function init(Module $module, string $template) : Source
    {
        return $this->setModule($module)->setTemplate($template);
    }

    /**
     * Retorna a instância de criação de arquivos
     *
     * @return FileSystem
     */
    private function system() : FileSystem
    {
        return new FileSystem($this);
    }
 
    /**
     * Define o módulo que o código será inserido
     *
     * @param Module $module
     * @return self
     */  
    public function setModule(Module $module) : self
    {
        $this->module = $module;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function module() : Module
    {
        return $this->module;
    }

    /**
     * {@inheritDoc}
     */
    public function setFilename(string $filename) : self
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function filename() : string
    {
        return $this->filename;
    }

    /**
     * Define o nome do template que é utilizado como base
     *
     * @param string $template
     * @return self
     */
    public function setTemplate(string $template) : self
    {
        $this->template = $template;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function template() : string
    {
        return $this->template;
    }

    /**
     * {@inheritDoc}
     */
    public function create()
    {
        return $this->system()->create();
    }
}