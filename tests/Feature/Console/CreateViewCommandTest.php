<?php

namespace Maestriam\Maestro\Tests\Feature\Console;

use Maestriam\Maestro\Tests\TestCase;

class CreateViewCommandTest extends TestCase
{
    public function testCreateViewCmd()
    {
        $command = 'maestro:view';
        
        $output = 'View created.';
        
        $params = ['name' => 'Aldebaran', 'module' => 'Taurus'];

        $this->artisan($command, $params)->expectsOutput($output);
    }
}
