<?php

namespace Maestriam\Maestro\Tests\Unit\Modules;

use Maestriam\Maestro\Entities\Module;
use Maestriam\Maestro\Tests\TestCase;

class CreateEntitiesTest extends TestCase
{
    /**
     * {@inheritDoc}
     */
    public function setUp() : void
    {
        parent::setUp();
    }

    /**
     * Testa se através do objeto de módulo consegue criar 
     * um novo controller em branco
     *
     * @return void
     */
    public function testCreateBlankController()
    {        
        $module = $this->getModule();

        $file = $module
                    ->controller()
                    ->blank('Ikki')
                    ->create();

        $this->assertContentHasParsed($file);
    }

    /**
     * Testa se através do objeto de módulo consegue criar 
     * um novo controller em branco
     *
     * @return void
     */
    public function testCreateMainControlelr()
    {
        $module = $this->getModule();

        $file = $module
                    ->controller()
                    ->main()
                    ->create();

        $this->assertContentHasParsed($file);
    }

    /**
     * Testa se através do objeto de módulo consegue criar 
     * um nova rota web
     *
     * @return void
     */
    public function testCreateWebRoute()
    {
        $module = $this->getModule();

        $file = $module
                    ->route()
                    ->web()
                    ->create();
        
        $this->assertContentHasParsed($file);
    }

    /**
     * Testa se através do objeto de módulo consegue criar 
     * um nova rota web
     *
     * @return void
     */
    public function testCreateApiRoute()
    {
        $module = $this->getModule();

        $file = $module
                    ->route()
                    ->api()
                    ->create();
        
        $this->assertContentHasParsed($file);
    }

    /**
     * Testa se através do objeto de módulo consegue criar 
     * um novo arquivo de configuração
     *
     * @return void
     */
    public function testCreateConfigFile()
    {
        $module = $this->getModule();

        $file = $module
                    ->configFile()
                    ->create();
        
        $this->assertContentHasParsed($file);
    }

    /**
     * Testa se através do objeto de módulo consegue criar 
     * um novo service provider principal
     *
     * @return void
     */
    public function testCreateMainProvider()
    {
        $module = $this->getModule();

        $file = $module
                    ->provider()
                    ->main()
                    ->create();
        
        $this->assertContentHasParsed($file);
    }

    /**
     * Testa se através do objeto de módulo consegue criar 
     * um novo service provider em branco
     *
     * @return void
     */
    public function testCreateBlankProvider()
    {
        $module = $this->getModule();

        $file = $module
                    ->provider()
                    ->blank('Ikki')
                    ->create();
        
        $this->assertContentHasParsed($file);
    }

    /**
     * Testa se através do objeto de módulo consegue criar 
     * um novo service provider de rotas
     *
     * @return void
     */
    public function testCreateRouteProvider()
    {
        $module = $this->getModule();

        $file = $module
                    ->provider()
                    ->route()
                    ->create();
        
        $this->assertContentHasParsed($file);
    }

    /**
     * Testa se através do objeto de módulo consegue criar 
     * um novo service provider principal
     *
     * @return void
     */
    public function testCreateModuleJson()
    {
        $module = $this->getModule();

        $file = $module
                    ->json()
                    ->moduleFile()
                    ->create();
        
        $this->assertContentHasParsed($file, true);
    }

    /**
     * Testa se através do objeto de módulo consegue criar 
     * um novo service provider principal
     *
     * @return void
     */
    public function testCreateBlankView()
    {
        $module = $this->getModule();

        $file = $module
                    ->resource()
                    ->view('Ikki')
                    ->create();
        
        $this->assertContentHasParsed($file);
    }

    /**
     * Testa se através do objeto de módulo consegue criar 
     * um novo service provider principal
     *
     * @return void
     */
    public function testCreateComposerJson()
    {
        $module = $this->getModule();

        $file = $module
                    ->json()
                    ->composerFile()
                    ->create();
        
        $this->assertContentHasParsed($file, true);
    }

    /**
     * Testa se através do objeto de módulo consegue criar 
     * uma nova factory
     *
     * @return void
     */
    public function testCreateFactory()
    {
        $module = $this->getModule();

        $file = $module
                    ->database()
                    ->factory('Ikki')
                    ->create();
        
        $this->assertContentHasParsed($file, true);
    }

    /**
     * Testa se através do objeto de módulo consegue criar 
     * uma nova factory
     *
     * @return void
     */
    public function testCreateModel()
    {
        $module = $this->getModule();

        $file = $module
                    ->database()
                    ->model('Ikki')
                    ->create();
        
        $this->assertContentHasParsed($file, true);
    }
    

    /**
     * Retorna um módulo para teste
     *
     * @return Module
     */
    protected function getModule() : Module
    {
        return $this->getModuleInstance('Phoenix');
    }
}