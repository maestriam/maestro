<?php

namespace Maestriam\Maestro\Entities\Containers;

use Illuminate\Support\Str;
use Maestriam\Maestro\Entities\Database\BaseMigration;
use Maestriam\Maestro\Entities\Database\BlankMigration;
use Maestriam\Maestro\Entities\Database\BlankSeed;
use Maestriam\Maestro\Entities\Database\MainMigration;
use Maestriam\Maestro\Entities\Model\BlankModel;

class DatabaseContainer extends BaseContainer
{
    /**
     * Retorna uma instância para manipulação de model
     *
     * @param string $name
     * @return BlankModel
     */
    public function model(string $name) : BlankModel
    {
        $module = $this->module();
        $model  = new BlankModel($module);

        return $model->setClassname($name);
    }

    /**
     * Retorna uma instância de seed para o banco de dados
     *
     * @param string $name
     * @return BlankSeed
     */
    public function seeder(string $name) : BlankSeed
    {
        $module = $this->module();
        $seed = new BlankSeed($module);    

        return $seed->setClassName($name);
    }

    /**
     * Retorna uma instância para um migration
     *
     * @param string $name
     * @return BaseMigration
     */
    public function migration(string $name) : BaseMigration
    {
        $migration = $this->decideMigration($name);

        return $migration->setClassName($name);
    }

    /**
     * Cria todas as entidades de banco de dados
     * ao criar o módulo
     *
     * @return DatabaseContainer
     */
    public function init() : DatabaseContainer
    {        
        $name = $this->module()->name();
        $exp  = 'Create' . $name;

        $this->model($name)->create();
        $this->seeder($name)->create();
        $this->migration($exp)->create();

        return $this;
    }

    /**
     * Decide qual migration deve usar, de acordo com o 
     * nome da classe que o usuário digitou
     *
     * @param string $name
     * @return BaseMigration
     */
    private function decideMigration(string $name) : BaseMigration
    {
        $module = $this->module();
        $input  = strtolower($name);

        return (Str::startsWith($input, 'create')) ? 
                    new MainMigration($module) : 
                    new BlankMigration($module);
    }
}