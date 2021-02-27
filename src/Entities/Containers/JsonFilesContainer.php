<?php

namespace Maestriam\Maestro\Entities\Containers;

use Maestriam\Maestro\Entities\Jsons\ComposerJson;
use Maestriam\Maestro\Entities\Jsons\ModuleJson;

class JsonFilesContainer extends BaseContainer
{
    /**
     * Retorna a instância para a manipulação do module.json
     *
     * @return ModuleJson
     */
    public function moduleFile() : ModuleJson
    {
        $json = new ModuleJson();
        
        return $json->module($this->moduleName);
    }
    
    /**
     * Retorna a instância para a manipulação do composer.json
     *
     * @return ComposerJson
     */
    public function composerFile() : ComposerJson
    {
        $json = new ComposerJson();
        
        return $json->module($this->moduleName);
    }
}