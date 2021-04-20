<?php

namespace Maestriam\Maestro\Concerns;

use Illuminate\Support\Facades\Config;
use Maestriam\FileSystem\Foundation\Drive;

/**
 * Instancia drives para manipulação de arquivos e diretórios,
 * dentro do sistema
 */
trait ManagesDrive
{
    private Drive $drive;

    public function drive() : Drive
    {
        $module = $this->lcname();

        $drive = $this->generateDriveName($module);

        return new Drive($drive);
    }

    /**
     * Inicia o drive para criação e manipulação de arquivos e diretórios,
     * dentro do módulo criado
     *
     * @return void
     */
    private function initDrive(string $module) : self
    {   
        $name  = $this->generateDriveName($module);
        $paths = $this->getStructure();
        
        $rootPath = $this->getRoot($module);
        $tplsPath = $this->getTemplate();
               
        $drive = new Drive($name); 
        
        $drive->structure()
              ->setRoot($rootPath)
              ->setTemplate($tplsPath)
              ->setPaths($paths);

        $drive->save();

        $this->drive = $drive; 
        
        return $this;
    }

    /**
     * Gera um nome 
     *
     * @param string $name
     * @return string
     */
    private function generateDriveName(string $name) : string
    {
        return 'drive-' . strtolower($name);
    }
    
    /**
     * Retorna o diretório raíz de onde serão criados os arquivos
     * pelo drive criado
     *
     * @param string $name
     * @return string
     */
    private function getRoot(string $name) : string
    {
        $root = Config::get('Maestro:forge.maestro.root_folder');        
        
        return $root . DS . strtolower($name);
    }

    /**
     * Retorna o caminho onde estão os arquivos stub para
     * o template
     *
     * @return string
     */
    private function getTemplate() : string
    {        

        return Config::get('Maestro:forge.maestro.template_folder');
    }

    /**
     * Retorna a lista de caminhos dinamicos de acordo com o template
     *
     * @return array
     */
    private function getStructure() : array
    {
        return Config::get('Maestro:forge.maestro.structure');
    }    
}
