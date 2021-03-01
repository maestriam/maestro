<?php

namespace Maestriam\Maestro\Tests\Unit\FileSystem;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Contracts\SourceInterface;
use Maestriam\Maestro\Entities\Module;

class CreateFileTest extends TestCase
{    
    /**
     * Instância 
     *
     * @return void
     */
    public function setUp() : void
    {
        parent::setUp();
    }

    public function testCreateFile()
    {
        $source = $this->getSource();

        dd($source);
    }

    /**
     * Retorna a instância 
     *
     * @return SourceInterface
     */
    private function getSource() : SourceInterface
    {
        $module = $this->getModule();
        $source = new SourceInterface();

        $source->setModule($module)
               ->setTemplate('module.blank')
               ->setFilename('BlankController.php')
               ->setPlaceholders([]);

        return $source;
    }
    
    /**
     * Retorna a instância de um módulo
     *
     * @return Module
     */
    private function getModule() : Module
    {
        return new Module('SandBox', $this->app);
    }
}