<?php

namespace Maestriam\Maestro\Entities\Database;

use Illuminate\Support\Str;
use Maestriam\Maestro\Entities\Source;

abstract class BaseMigration extends Source
{
    private string $className;

    /**
     * Converte o nome para snake_case
     *
     * @param string $name
     * @return string
     */
    protected function toSnake(string $name) : string
    {
        $exp  = "%s_%s.php";
        $now  = now()->format('Y_m_d_hms');
        $name = preg_replace('/\B([A-Z])/', '_$1', $name);

        return strtolower(sprintf($exp, $now, $name));
    }

    /**
     * Define o nome do migration
     *
     * @return BaseMigration
     */
    public function setClassName(string $name) : BaseMigration
    {
        $this->className = $name;

        return $this;
    }

    /**
     * Retorna a classe do migration
     *
     * @return string
     */
    public function className() : string
    {
        return Str::studly($this->className);
    }

    /**
     * {@inheritDoc}
     */
    public function filename() : string
    {
        $name = $this->className();

        return $this->toSnake($name);
    }
}