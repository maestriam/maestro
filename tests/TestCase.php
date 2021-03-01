<?php

namespace Maestriam\Maestro\Tests;

use Maestriam\Forge\Providers\ForgeServiceProvider;
use Maestriam\Maestro\Entities\Module;
use Orchestra\Testbench\TestCase as BaseTesCase;
use Maestriam\Maestro\Providers\MaestroServiceProvider;

class TestCase extends BaseTesCase
{
    public function setUp() : void
    {
        parent::setUp();
    }

    /**
     * Retorna o Service Provider para carregamento
     *
     * @param mixed $app
     * @return array
     */
    protected function getPackageProviders($app) : array
    {
        return [
            MaestroServiceProvider::class,
            ForgeServiceProvider::class
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('Maestro:config', [
            'author' => [
                'name'  => 'Giuliano Sampaio',
                'email' => 'giuguitar@gmail.com'
            ]
        ]);

        $app['config']->set('Maestro:forge', [
            'maestro' => [
                'root_folder' => __DIR__ . '/../devnull',
                'template_folder' => __DIR__ . '/../templates',
                'structure' => [            
                    'json.*'       => '.',
                    'provider.*'   => 'Providers',            
                    'route.*'      => 'Routes',
                    'controller.*' => 'Http/Controllers',
                    'config'       => 'Config',
                    'view.blank'   => 'Resources/views'
                ]
            ]
        ]);
    }

    /**
     * Retorna a instância de módulo
     *
     * @param string $name
     * @return Module
     */
    protected function getModuleInstance(string $name = 'Foo') : Module
    {
        return new Module($name, $this->app);
    }

    /**
     * Testa se o conteúdo do template foi interpretado corretamente
     *
     * @param mixed $file
     * @return void
     */
    protected function assertContentHasParsed($file) : void
    {
        $content = file_get_contents($file->path);

        $this->assertStringNotContainsString("{{", $content);
        $this->assertStringNotContainsString("}}", $content);  
    }
}