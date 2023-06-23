<?php

namespace Maestriam\Maestro\Foundation\Setup;

class AutoloadSetup
{
    private string $file;

    public function __construct()
    {
        $this->file = base_path('composer.json');        
    }

    /**
     * Define o autoload dos módulos Maestro no composer.json
     * principal do projeto. 
     *
     * @return void
     */
    public function setup()
    {
        $composer = $this->decode();
        $autoload = $composer->autoload;

        $autoload->{'psr-4'}->{'Maestro\\'} = "maestro/";
        $composer->autoload = $autoload;
        
        $this->save($composer);
    }

    /**
     * Retorna o conteúdo do arquivo composer.json da raíz do projeto,
     * em formato de objeto json.
     *
     * @return object
     */
    private function decode() : object
    {
        $content = file_get_contents($this->file);

        $json = json_decode($content);

        return $json;
    }

    /**
     * Salva o novo conteúdo no arquivo composer.json do projeto.
     *
     * @param object $json
     * @return void
     */
    private function save(object $json)
    {
        $content = json_encode(
            $json, 
            JSON_PRETTY_PRINT | 
            JSON_UNESCAPED_SLASHES | 
            JSON_UNESCAPED_UNICODE
        );

        file_put_contents($this->file, $content);
    }
}