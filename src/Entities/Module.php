<?php

namespace Maestriam\Maestro\Entities;

use Illuminate\Container\Container;
use Maestriam\FileSystem\Foundation\Drive;
use Maestriam\Maestro\Entities\FileDriver;
use Maestriam\Maestro\Concerns\ActivesModule;
use Maestriam\Maestro\Concerns\ManagesContainers;
use Maestriam\Maestro\Contracts\ModuleInterface;
use Maestriam\Maestro\Exceptions\ModuleAlreadyExistsException;
use Maestriam\Maestro\Exceptions\ModuleNotFoundException;

class Module implements ModuleInterface
{    
    use ManagesContainers, ActivesModule;

    /** 
     * Nome do módulo
     */
    private string $name;

    /**
     * Vendor do módulo
     */
    private string $vendor;

    /**
     * Instância de aplicação Laravel
     */
    private Container $app;

    /**
     * Instância para manipulação de arquivos e diretórios
     */
    private FileDriver $drive;

    public function __construct(string $name, Container $app)
    {
        $this->setVendor('Maestro')
             ->setName($name)             
             ->setApp($app)
             ->initDrive($name);    
    }

    /**
     * Define o nome do módulo
     *
     * @param string $name
     * @return Module
     */
    private function setName(string $name) : Module
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Define o vendor do módulo
     *
     * @param Container $app
     * @return Module
     */
    private function setVendor(string $vendor) : Module
    {
        $this->vendor = $vendor;
        return $this;
    }
    
    /**
     * Define a instância da aplicação Laravel
     *
     * @param Container $app
     * @return Module
     */
    private function setApp(Container $app) : Module
    {
        $this->app = $app;
        return $this;
    }
    
    /**
     * Inicia o drive para o módulo
     *
     * @return Module
     */
    private function initDrive() : Module
    {
        $name = $this->lcname();

        $this->drive = new FileDriver($name);

        return $this;
    }
    
    /**
     * {@inheritDoc}
     */
    public function name() : string
    {
        return ucfirst($this->name);
    }

    /**
     * {@inheritDoc}
     */
    public function path() : string
    {
        return $this->drive->rootPath();
    }

    /**
     * Retorna o caminho dos arquivos de migration do módulo
     *
     * @return string
     */
    public function migrationPath() : string
    {
        return $this->drive->migrationPath();
    }

    /**
     * Retorna o caminho dos arquivos de seeds do módulo
     *
     * @return string
     */
    public function seedPath() : string
    {
        return $this->drive->seedPath();
    }

    /**
     * {@inheritDoc}
     */
    public function lcname() : string
    {
        return strtolower($this->name);
    }

    /**
     * {@inheritDoc}
     */
    public function vendor() : string
    {
        return ucfirst($this->vendor);
    }

    /**
     * {@inheritDoc}
     */
    public function namespace(bool $doubleBackSlash = false) : string
    {
        $pattern = ($doubleBackSlash) ? "%s\\\\%s\\\\" : "%s\\%s\\";

        return sprintf($pattern, $this->vendor(), $this->name());
    }

    /**
     * {@inheritDoc}
     */
    public function drive() : Drive
    {
        return $this->drive->get();
    }

    /**
     * {@inheritDoc}
     */
    public function create() : Module
    {
        if ($this->exists()) {
            throw new ModuleAlreadyExistsException($this->name());
        }

        $this->json()->init();
        $this->route()->init();
        $this->resource()->init();
        $this->provider()->init();
        $this->controller()->init();
        $this->configFile()->create();
        $this->database()->init();
        
        return $this;
    }
    
    /**
     * {@inheritDoc}
     */
    public function exists() : bool
    {
        return (is_dir($this->path())) ? true : false;
    }

    /**
     * {@inheritDoc}
     */
    public function find() : ?Module
    {
        return ($this->exists()) ? $this : null;
    }

    /**
     * {@inheritDoc}
     */
    public function findOrFail() : Module
    {
        if (! $this->find()) {
            throw new ModuleNotFoundException($this->name);            
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function info() : object
    {
        $path = $this->path() . 'module.json';

        $content = file_get_contents($path);

        $info = (object) json_decode($content);

        return $info;
    }
}
