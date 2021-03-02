<?php

namespace Maestriam\Maestro\Entities\Containers;

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

    public function migrator()
    {

    }

    public function init() : DatabaseContainer
    {
        $name = $this->module()->name();
        
        $this->model($name)->create();

        return $this;
    }
}