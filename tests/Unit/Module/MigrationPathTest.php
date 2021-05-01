<?php

namespace Maestriam\Maestro\Tests\Unit\Modules;

use Maestriam\Maestro\Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class MigrationPathTest extends TestCase
{
    /**
     * {@inheritDoc}
     */
    public function setUp() : void
    {
        parent::setUp();
    }
    
    public function testMigrattionPath()
    {
        $module = $this->getModuleInstance('Pegasus');

        $path = $module->migrationPath();

        $this->assertStringNotContainsString('//', $path);
        $this->assertStringNotContainsString('\\\\', $path);
    }
}