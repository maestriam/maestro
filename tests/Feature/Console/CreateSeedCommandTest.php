<?php

namespace Maestriam\Maestro\Tests\Feature\Console;

use Maestriam\Maestro\Tests\TestCase;

class CreateSeedCommandTest extends TestCase
{
    public function testCreateSeedCmd()
    {
        $module = 'Hercules';

        $this->getModuleInstance($module)->create();

        $output = 'Seeder created.';
        $command = 'maestro:seeder';
        $params = ['name' => 'Algethi', 'module' => $module];

        $this->artisan($command, $params)->expectsOutput($output);
    }
}
