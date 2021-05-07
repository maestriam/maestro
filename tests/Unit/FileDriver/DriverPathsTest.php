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

        $this->verifyPath($path);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function testMigrationPath()
    {
        $driver = new FileDriver('Auriga');

        $path = $driver->migrationPath();

        $this->verifyPath($path);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function testRootPath()
    {
        $driver = new FileDriver('Auriga');

        $path = $driver->rootPath();

        $this->verifyPath($path);
    }

    /**
     * Testa se o caminho raiz do módulo está com as devidas separações.
     * Se o nome do módulo não está grudado com o diretório ráiz de módulos
     * 
     * Exemplo:
     * Raiz do módulo = maestro/MyModule    // caminho correto
     * Raiz do módulo = maestroMyModule     // caminho errado
     *
     * @return void
     */
    public function testGluedRootPath()
    {
        $base = config('Maestro:forge.maestro.root_folder');

        $isSeparator = $this->lastCharIsSeparator($base);

        $this->assertTrue($isSeparator);
    }

    /**
     * Testa se o caminho especificado é um caminho válido e mantem os padrões
     * 
     *
     * @param string $path
     * @return void
     */
    private function verifyPath(string $path)
    {
        $this->assertIsString($path);
        $this->assertNotEmpty($path);
        $this->assertStringNotContainsString('//', $path);
        $this->assertStringNotContainsString('\\\\', $path);
    }

    /**
     * Retorna se 
     *
     * @param string $str
     * @return boolean
     */
    private function lastCharIsSeparator(string $str) : bool
    {
        $last = substr($str, -1);

        return ($last == '/' || $last == '\\');
    }   
}