<?php

namespace Maestriam\Maestro\Foundation\Setup;

use Maestriam\Maestro\Contracts\SetupInterface;
use Maestriam\Maestro\Foundation\Registers\EnvHandler;

class EnvSetup implements SetupInterface
{
    private EnvHandler $handler;

    public function __construct()
    {
        $this->handler = new EnvHandler();
    }

    public function setup()
    {
        $this->handler->set('DB_CONNECTION', 'sqlite');
        $this->handler->remove('DB_DATABASE');
    }
}