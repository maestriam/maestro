<?php

namespace Maestriam\Maestro\Tests\Feature\Console;

use Maestriam\Maestro\Tests\TestCase;

class CreateSeedCommandTest extends TestCase
{
    public function testCreateSeedCmd()
    {
        $output = 'Seeder created.'; 

        $command = 'maestro:seeder';

        $parameters = ['name' => 'Algethi', 'module' => 'Olaf'];

        $this->artisan($command, $parameters)->expectsOutput($output);
    }
}
