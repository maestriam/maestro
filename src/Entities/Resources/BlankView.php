<?php
namespace Maestriam\Maestro\Entities\Resources;

use Maestriam\Maestro\Entities\Module;
use Maestriam\Maestro\Entities\Source;

class BlankView extends Source
{
    public function __construct(Module $module)
    {
        $this->setModule($module)
             ->setTemplate('view-blank');
    }

    /**
     * Define o nome da view
     *
     * @param string $name
     * @return self
     */
    public function setName(string $name) : self
    {
        $this->name = strtolower($name);
        return $this;
    }

    /**
     * Retorna o nome da view
     *
     * @return string
     */
    public function name() : string
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function filename(): string
    {
        return $this->name() . '.blade.php';
    }

    /**
     * {@inheritDoc}
     */
    public function placeholders(): array
    {
        return [
            'module' => $this->module()->name(),
        ];
    }
}