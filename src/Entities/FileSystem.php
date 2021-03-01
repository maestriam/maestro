<?php

namespace Maestriam\Maestro\Entities;

use Maestriam\Forge\Entities\Forge; 
use Illuminate\Support\Facades\Config;
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
        $this->setSource($source)
             ->loadConfig()
             ->defineLocation();
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
     * Undocumented function
     *
     * @return self
     */
    private function loadConfig() : FileSystem
    {                            
        $this->config = Config::get('Maestro:forge');
        return $this;
    }

    /**
     * Retorna o caminho do módulo
     *
     * @return string
     */
    private function getRootFolder() : string
    {
        $module = $this->source->module()->name();
        $config = $this->config[$this->key];        
        $folder = $config['root_folder'];

        return $folder . DS . $module;
    }

    /**
     * Ajusta nas configurações o local onde será
     * depositado os arquivos depois de criados
     *
     * @todo Deixar essa regra no pacote Forge
     * @return self
     */
    private function defineLocation() : FileSystem
    {
        $folder = $this->getRootFolder();
        $config = $this->config[$this->key]; 

        $config['root_folder'] = $folder;
        $this->config[$this->key] = $config;
        
        return $this;
    }

    /**
     * Retorna a instância do Maestriam/Forge
     *
     * @return Forge
     */
    private function forge() : Forge
    {
        $setup    = $this->key;
        $config   = $this->config;
        $template = $this->source->template();

        return new Forge($setup, $template, $config);
    }

    /**
     * Executa a criação do arquivo
     *
     * @return void
     */
    public function create()
    {
        $filename  = $this->source->filename();
        $arguments = $this->source->placeholders();

        return $this->forge()->create($filename, $arguments);
    }

}