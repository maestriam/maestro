<?php

namespace Maestriam\Maestro\Tests\Feature\Console;

use Maestriam\Maestro\Tests\TestCase;

class SetAutoloadCommandTest extends TestCase
{
    public function testSetAutoload()
    {
        $command = 'maestro:set-autoload';

        $output = 'Autoload defined in composer.json';
                
        $this->artisan($command)->expectsOutput($output);
    }
}
