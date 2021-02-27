<?php

namespace Maestriam\Maestro\Entities\Providers;

class MainServiceProvider extends BaseProvider 
{
    /**
     * Nome do template
     */
    protected string $template = 'provider.main';

    /**
     * 
     */
    protected string $suffix = 'ServiceProvider.php';

    /**
     * {@inheritDoc}
     */
    protected function getArguments() : array
    {
        return [
            'lowername' => $this->getLowername(),
            'uppername' => $this->getUppername(),
            'namespace' => $this->getNamespace()
        ];
    }

    /**
     * Retorna o nome do modulo 
     *
     * @return string
     */
    protected function getNamespace() : string 
    {
        $vendor = ucfirst($this->vendor);
        $module = ucfirst($this->module);
        
        return sprintf("%s\\%s", $vendor, $module);
    }

    /**
     * Retorna o nome
     *
     * @return string
     */
    protected function getUppername() : string
    {
        return ucfirst($this->module);
    }

    /**
     * Undocumented function
     *
     * @return string
     */
    protected function getLowername() : string
    {
        return strtolower($this->module);
    }

    /**
     * Retorna o nome do arquivo 
     *
     * @return string
     */
    protected function getFilename() : string
    {
        return ucfirst($this->module) . $this->suffix;
    }
}