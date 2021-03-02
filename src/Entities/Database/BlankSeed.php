<?php

namespace Maestriam\Maestro\Entities\Database;

use Maestriam\Maestro\Entities\Module;
use Maestriam\Maestro\Entities\Source;

class BlankSeed extends Source 
{
    private string $className;

   /**
    * Classe de seed 
    *
    * @param Module $module
    */ 
    public function __construct(Module $module)
    {
        $this->init($module, 'seed-blank');
    }

    /**
     * Define o nome da classe e do arquivo do seed. 
     *
     * @param string $name
     * @return Controller
     */
    public function setClassName(string $name) : BlankSeed
    {
        $this->className = ucfirst($name);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function filename() : string
    {
        return $this->className() . 'Seeder.php';
    }

    /**
     * Retorne o nome da classe do seed
     *
     * @return string
     */
    public function className() : string
    {
        return $this->className;
    }

    /**
     * {@inheritDoc}
     */
    public function placeholders(): array
    {        
        return [
            'namespace' => $this->module()->namespace(),
            'classname' => $this->className()
        ];        
    }
}