<?php

namespace Maestriam\Maestro\Contracts;

use Illuminate\Container\Container;
use Maestriam\Maestro\Entities\Module;
use Maestriam\FileSystem\Foundation\Drive;

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
     * Instância com as regras de negócio para gerenciamento de caminhos
     * e criação de arquivos e diretórios do módulo
     *
     * @return Drive
     */
    public function drive() : Drive;

    /**
     * Cria um novo módulo no projeto
     *
     * @return Module
     */
    public function create() : Module;

    /**
     * Retorna o caminho raíz do módulo
     *
     * @return string
     */
    public function path() : string;

    /**
     * Retorna as informações do módulo, 
     * vindas do arquivo module.json
     *
     * @return array
     */
    public function info() : object;

    /**
     * Verifica se o módulo existe.
     *
     * @return boolean
     */
    public function exists() : bool;

    /**
     * Tenta encontrar um módulo com um nome específico.
     * Caso não encontre, retorna uma exception informando que não 
     * foi encontrado.
     *
     * @return  Module 
     */
    public function findOrFail() : Module;    

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
}