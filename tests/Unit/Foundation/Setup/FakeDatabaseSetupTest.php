<?php

namespace Maestriam\Maestro\Tests\Unit\Foundation\Composer;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Foundation\Setup\FakeDatabaseSetup;

class FakeDatabaseSetupTest extends TestCase
{
    public function testAutoloadEditor()
    {
        $database = new FakeDatabaseSetup();
        $database->setup();
        
        $file = $database->getFilename();
        $this->assertFileExists($file);
    }
}