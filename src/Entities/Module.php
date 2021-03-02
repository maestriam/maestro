<?php

namespace Maestriam\Maestro\Entities;

use Illuminate\Container\Container;
use Maestriam\Maestro\Concerns\ActivesModule;
use Maestriam\Maestro\Concerns\ManagesContainers;
use Maestriam\Maestro\Contracts\ModuleInterface;

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

    public function __construct(string $name, Container $app)
    {
        $this->setVendor('Maestro')
             ->setName($name)             
             ->setApp($app);    
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
     * {@inheritDoc}
     */
    public function name() : string
    {
        return ucfirst($this->name);
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
    public function create() : Module
    {
        $this->json()->init();
        $this->route()->init();
        $this->resource()->init();
        $this->provider()->init();
        $this->controller()->init();
        $this->configFile()->create();
        return $this;
    }
}