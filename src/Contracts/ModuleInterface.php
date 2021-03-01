<?php

namespace Maestriam\Maestro\Contracts;

use Illuminate\Container\Container;
use Maestriam\Maestro\Entities\Module;

interface ModuleInterface
{
    /**
     * Retorna o nome do módulo
     *
     * @return string
     */
    public function name() : string;

    /**
     * Retorna o nome do módulo em minusculo
     *
     * @return string
     */
    public function lcname() : string;

    /**
     * Retorna o vendor do módulo
     *
     * @return string
     */
    public function vendor() : string;

    /**
     * Retorna o namespace do módulo
     *
     * @param boolean $doubleBackSlashes Adiciona dupla barra invertida
     * @return string
     */
    public function namespace(bool $doubleBackSlashes = false) : string; 

    /**
     * Cria um novo módulo no projeto
     *
     * @return Module
     */
    public function create() : Module;

    /**
     * Tenta encontrar um módulo com um nome específico
     *
     * @return Module|null
     */
    // public function find() : ?Module;

    /**
     * Tenta encontrar um módulo com um nome específico.
     * Caso não encontre, cria o módulo.
     *
     * @return Module
     */
    // public function findOrCreate() : Module;

    /**
     * Verifica se o módulo existe.
     *
     * @return boolean
     */
    // public function exists() : bool;

    /**
     * Define um novo módulo como "ativado"
     *
     * @return boolean
     */
    // public function enable() : bool;

    /**
     * Define um novo módulo como "desativado"
     *
     * @return boolean
     */
    // public function disable() : bool;

    /**
     * Retorna as informações básicas do módulo
     *
     * @return array
     */
    // public function info() : array;
}