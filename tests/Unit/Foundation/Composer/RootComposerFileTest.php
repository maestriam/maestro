<?php

namespace Maestriam\Maestro\Tests\Unit\Foundation\Composer;

use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Foundation\Composer\RootComposerFile;

class RootComposerFileTest extends TestCase
{
    public function testAutoloadEditor()
    {
        $file = new RootComposerFile();

        $this->assertNull($file->setAutoload());
    }
}