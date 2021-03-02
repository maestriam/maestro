<?php

namespace Maestriam\Maestro\Entities\Containers;

use Maestriam\Maestro\Entities\Jsons\ComposerJson;
use Maestriam\Maestro\Entities\Jsons\ModuleJson;
use Maestriam\Maestro\Entities\Module;

class JsonFilesContainer extends BaseContainer
{      
    /**
     * Retorna a instância para a manipulação do module.json
     *
     * @return ModuleJson
     */
    public function moduleFile() : ModuleJson
    {
        $module = $this->module();

        return new ModuleJson($module);    
    }
    
    /**
     * Retorna a instância para a manipulação do composer.json
     *
     * @return ComposerJson
     */
    public function composerFile() : ComposerJson
    {
        $module = $this->module();

        return new ComposerJson($module);
    }

    /**
     * Cria todos os arquivos Json dentro do módulo
     *
     * @return JsonFilesContainer
     */
    public function init() : JsonFilesContainer
    {
        $this->composerFile()->create();
        $this->moduleFile()->create();

        return $this;
    }
}