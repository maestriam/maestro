<?php

namespace Maestriam\Maestro\Tests\Units\Controllers;

use Maestriam\Maestro\Tests\TestCase;

abstract class ControllerTestCase extends TestCase
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
     * Realiza os testes de integridade do objeto de controller
     *
     * @param mixed $controller
     * @return void
     */
    protected function assertControllerObject(mixed $controller)
    {      
        $this->assertObjectHasAttribute('name', $controller);
        $this->assertObjectHasAttribute('module', $controller);
    }
    
    /**
     * Realiza os testes de verificação da criação do arquivo de controller
     *
     * @param mixed $file
     * @return void
     */
    protected function assertControllerFile(mixed $file)
    {
        $this->assertFileExists($file->path);
    }
}