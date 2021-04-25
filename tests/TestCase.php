<?php

namespace Maestriam\Maestro\Tests;

use Maestriam\Maestro\Entities\Module;
use Orchestra\Testbench\TestCase as BaseTesCase;
use Maestriam\FileSystem\Providers\FileSystemProvider;
use Maestriam\Maestro\Providers\MaestroServiceProvider;

class TestCase extends BaseTesCase
{
    /**
     * {@inheritDoc}
     */
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
            FileSystemProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {

        $app['config']->set('database.default', 'sqlite');
        
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $app['config']->set('Maestro:config', [
            'author' => [
                'name'  => 'Giuliano Sampaio',
                'email' => 'giuguitar@gmail.com'
            ]
        ]);

        $app['config']->set('Maestro:forge', [
            'maestro' => [
                'root_folder'      => __DIR__ . '/../sandbox/',
                'template_folder'  => __DIR__ . '/../templates/',
                'migration_folder' => 'Database/Migrations/',
                'structure' => [            
                    'json-*'       => '.',
                    'provider-*'   => 'Providers/',
                    'route.*'      => 'Routes/',
                    'controller-*' => 'Http/Controllers/',
                    'file-config'  => 'Config/',
                    'view-*'       => 'Resources/views/',
                    'model-*'      => 'Entities/',
                    'migration-*'  => 'Database/Migrations/',
                    'seed-*'       => 'Database/Seeders/',
                    'factory-*'    => 'Database/Factories/'
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
    protected function getModuleInstance(string $name = 'Pegasus') : Module
    {
        return new Module($name, $this->app);
    }

    /**
     * Testa se o conteúdo do template foi interpretado corretamente
     *
     * @param $file
     * @param boolean $assertDoubleSlashes
     * @return void
     */
    protected function assertContentHasParsed($file, $assertDoubleSlashes = false) : void
    {
        $content = file_get_contents($file->absolute_path);

        $this->assertFileExists($file->absolute_path);
        $this->assertStringNotContainsString("{{", $content);
        $this->assertStringNotContainsString("{{", $content);
        
        if (! $assertDoubleSlashes) {
            $this->assertHasNoDoubleBackSlashes($content);            
        }
    }
        
    protected function assertHasNoDoubleBackSlashes($content)
    {
        $this->assertStringNotContainsString("\\\\", $content);  
    }
}