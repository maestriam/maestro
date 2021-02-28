<?php

namespace Maestriam\Maestro\Tests\Units\Json;

use Maestriam\Maestro\Tests\TestCase;

abstract class JsonTestCase extends TestCase
{   
    /**
     * Undocumented function
     *
     * @return void
     */ 
    public function setUp() : void
    {
        parent::setUp();
    }

    /**
     * Realiza os testes de integridade do objeto de composer
     *
     * @param mixed $composer
     * @return void
     */
    protected function assertIsJsonObject($composer)
    {              
        $this->assertObjectHasAttribute('module', $composer);
    }
    
    /**
     * Realiza os testes de verificação da criação do arquivo de composer
     *
     * @param mixed $file
     * @return void
     */
    protected function assertIsJsonFile($file)
    {
        $this->assertFileExists($file->path);
        $this->assertStringEndsWith('.json', $file->path);
    }
}