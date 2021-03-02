<?php

namespace Maestriam\Maestro\Tests\Unit\Activator;

use Maestriam\Maestro\Tests\TestCase;
use Nwidart\Modules\Activators\FileActivator;

class ActivateModuleTest extends TestCase
{
    /**
     * Configura os testes 
     *
     * @return void
     */
    public function setUp() : void
    {
        parent::setUp();
    }

    /**
     * Verifica se é possível registrar um módulo através do 
     * laravel-modules 
     *
     * @return void
     */
    public function testActivateModule()
    {
        $module    = 'Virgo'; 
        $activator = new FileActivator($this->app);
        
        $activator->setActiveByName($module, true);

        $this->assertModuleIsRegistred($module);
    }

    /**
     * Verifica se o modulo foi registrado com sucesso
     *
     * @param string $module
     * @return void
     */
    protected function assertModuleIsRegistred(string $module) : void
    {
        $json = $this->readJson();

        $this->assertIsArray($json);
        $this->assertArrayHasKey($module, $json);
        $this->assertIsBool($json[$module]);
        $this->assertTrue($json[$module]);
    }

    /**
     * Retorna o conteúdo do arquivo de status dos módulos
     *
     * @return array
     */
    protected function readJson() : array
    {
        $filename = config('modules.activators.file.statuses-file');
        $content  = file_get_contents($filename);
        
        return json_decode($content, true);
    }
}