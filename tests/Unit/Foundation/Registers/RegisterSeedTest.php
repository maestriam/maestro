<?php

namespace Maestriam\Maestro\Tests\Unit\Foundation\Registers;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Foundation\Registers\FileRegister;
use Maestriam\Maestro\Exceptions\InvalidPathToRegisterFileException;

class RegisterSeedTest extends TestCase
{
    /**
     * Importa arquivos PHP dentro de um diretório do módulo.  
     *
     * @return void
     */
    public function testValidPath()
    {        
        $module = $this->getModuleInstance('Phoenix')->create();
        
        $path = $module->seedPath();

        $ret = FileRegister::from($path);

        $this->assertNull($ret);
    }

    /**
     * Importa arquivos PHP dentro de um diretório inválido.  
     *
     * @return void
     */
    public function testRegisterInvalidPath()
    {
        $this->expectException(InvalidPathToRegisterFileException::class);

        FileRegister::from('invalid-path-to-crash-application');
    }
}