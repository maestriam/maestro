<?php

namespace Maestriam\Maestro\Entities\Containers;

use Illuminate\Support\Str;
use Maestriam\Maestro\Entities\Database\BaseMigration;
use Maestriam\Maestro\Entities\Database\BlankMigration;
use Maestriam\Maestro\Entities\Database\MainMigration;
use Maestriam\Maestro\Entities\Model\BlankModel;

class DatabaseContainer extends BaseContainer
{
    public function model(string $name)
    {
        $module = $this->module();
        $model  = new BlankModel($module);

        return $model->setClassname($name);
    }

    public function seeder()
    {
        

    }

    public function migration(string $name)
    {
        $migration = $this->decideMigration($name);

        return $migration->setClassName($name);
    }

    public function init() : DatabaseContainer
    {
        $name = $this->module()->name();
        
        $this->model($name)->create();

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