<?php

namespace Maestriam\Maestro\Tests\Unit\Foundation\Registers;

use Illuminate\Support\Facades\Artisan;
use Maestriam\Maestro\Tests\TestCase;
use Maestriam\Maestro\Entities\Module;
use Maestriam\Maestro\Foundation\Database\Seeder;
use Maestriam\Maestro\Foundation\Registers\FileRegister;

class RegisterSeedTest extends TestCase
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function testValidPath()
    {        
        $module = $this->getModuleInstance('Phoenix');
        
        $path = $module->seedPath();

        $ret = FileRegister::from($path);

        $this->assertNull($ret);
    }

    public function testRegisterInvalidPath()
    {
        $ret = FileRegister::from('invalid-path');

        $this->assertNull($ret);
    }
}