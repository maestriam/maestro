<?php

namespace Maestriam\Maestro\Entities\Containers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Maestriam\Maestro\Entities\Database\BlankFactory;
use Maestriam\Maestro\Entities\Database\BlankSeed;
use Maestriam\Maestro\Entities\Database\BaseMigration;
use Maestriam\Maestro\Entities\Database\BlankMigration;
use Maestriam\Maestro\Entities\Database\MainMigration;
use Maestriam\Maestro\Entities\Model\BlankModel;
use Maestriam\Maestro\Foundation\Database\Seeder;

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
     * Retorna uma instância de factory para a Model
     *
     * @param string $name
     * @return BlankFactory
     */
    public function factory(string $name) : BlankFactory
    {
        $module  = $this->module();
        $factory = new BlankFactory($module);

        return $factory->setClassName($name);
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
        $this->factory($name)->create();
        $this->migration($exp)->create();

        return $this;
    }

    /**
     * Executa o migration do banco de dados do módulo
     *
     * @return bool
     */
    public function migrate() : null|string
    {
        try 
        {
            $path = $this->module()->migrationPath(); 

            Artisan::call('migrate', ['--path' => $path]);
            
            return null;
        
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Exceuta o rollback dos migrations executados na base de dados
     *
     * @return boolean
     */
    public function rollback() : bool|string
    {
        try 
        {
            $path = $this->module()->migrationPath(); 
            
            $name = $this->module()->name();

            $signature = "module:migrate-rollback {$name}";

            $ret = Artisan::call($signature);

            return true;
        
        } catch (\Exception $e) {            
            return $e->getMessage();
        }        
    }

    /**
     * Executa as classes de população das tabelas do módulo
     *
     * @return boolean
     */
    public function seed() : string|null
    {
        $module = $this->module();

        $seeder = new Seeder($module);

        return $seeder->seed();
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

        if (Str::startsWith($input, 'create')) {
            return new MainMigration($module);
        } 
                     
        return new BlankMigration($module);
    }
}