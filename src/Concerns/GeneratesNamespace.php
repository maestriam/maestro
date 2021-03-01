<?php

namespace Maestriam\Maestro\Concerns;

trait GeneratesNamespace
{
    /**
     * Retorna a string de namespace de uma classe
     * baseado no nome do vendor e o nome do módulo
     *
     * @return string
     */
    protected function getNamespace() : string
    {
        $module = $this->getModule();
        $vendor = $this->getVendor();

        $pattern = "%s\\%s";

        return sprintf($pattern, ucfirst($vendor), ucfirst($module));
    }
}
