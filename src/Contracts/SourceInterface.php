<?php

namespace Maestriam\Maestro\Contracts;

use Maestriam\Maestro\Entities\Module;

interface SourceInterface
{
    /**
     * Retorna o nome do arquivo 
     *
     * @return string
     */
    public function filename() : string;

    /**
     * Retorna o módulo que o código está inserido
     *
     * @return Module
     */
    public function module() : Module;

    /**
     * Retorna o nome do template
     *
     * @return string
     */
    public function template() : string;    

    /**
     * Undocumented function
     *
     * @return array
     */
    public function placeholders() : array;

    /**
     * Executa a criação do arquivo
     *
     * @return self
     */
    public function create();
}