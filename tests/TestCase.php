<?php

namespace Maestriam\Maestro\Tests;

use Maestriam\Forge\Entities\Forge;
use Maestriam\Forge\Providers\ForgeServiceProvider;
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

    protected function getConfig() : array
    {
        return [
            'tests' => [
                'root_folder'     => 'sandbox\SandBox',
                'template_folder' => 'templates',
                'structure'       => [
                    'controller.*' => 'Http/Controllers',
                    'provider.*'   => 'Providers'
                ]
            ]
        ];
    }
}