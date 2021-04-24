<?php

namespace Maestriam\Maestro\Entities;

use Maestriam\Forge\Entities\Forge; 
use Illuminate\Support\Facades\Config;
use Maestriam\FileSystem\Support\FileSystem as System;
use Maestriam\Maestro\Contracts\SourceInterface;

class FileSystem
{
    /**
     * Chave de configuração utilizada para Maestriam/Forge
     */
    protected string $key = 'maestro'; 

    /**
     * Dados da configuração Forge
     */
    protected array $config = [];

    /**
     * Dados do arquivo
     */
    protected SourceInterface $source;

    /**
     * Nome do módulo
     */
    protected string $module;

    /**
     * Regras de negócio
     *
     * @param SourceInterface $source
     */
    public function __construct(SourceInterface $source)
    {
        $this->setSource($source);
    }

    /**
     * Define o arq
     *
     * @param string $module
     * @return self
     */
    private function setSource(SourceInterface $source) : FileSystem
    {
        $this->source = $source;
        return $this;
    }

    /**
     * Executa a criação do arquivo
     *
     * @return void
     */
    public function create()
    {
        $filename = $this->source->filename();
        $template = $this->source->template();        
        $content  = $this->source->placeholders();

        $drive = $this->source->module()->drive();

        $file = $drive->template($template);
        
        return $file->create($filename, $content);
    }
}