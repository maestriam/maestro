<?php

namespace Maestriam\Maestro\Tests\Foundation;

use Maestriam\Maestro\Entities\FileDriver;
use Maestriam\Maestro\Tests\TestCase;

class DriverPathsTest extends TestCase
{
    /**
     * Verifica se retorna o caminho dos diretórios do seeders corretament
     *
     * @return void
     */
    public function testSeedPath()
    {    
        $driver = new FileDriver('Auriga');

        $path = $driver->seedPath();

        $this->assertIsString($path);
        $this->assertStringNotContainsString('//', $path);
        $this->assertStringNotContainsString('\\\\', $path);
    }
}