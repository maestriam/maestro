<?php

namespace Maestriam\Maestro\Foundation\Setup;

class FakeDatabaseSetup 
{
    private string $database = 'database.sqlite';

    private EnvSetup $env;

    public function __construct()
    {
        $this->env = new EnvSetup();
    }

    public function setup()
    {
        $this->touchDatabase()->configEnv();        
    }

    /**
     * Define as configurações do banco de dados no arquivo .env
     *
     * @return self
     */
    private function configEnv() : self
    {
        $this->env->setup();

        return $this;
    }

    /**
     * Cria um novo arquivo de banco de dados sqlite 
     * para realização de testes e desenvolvimento.
     *
     * @return self
     */
    public function touchDatabase() : self
    {
        $file = $this->getFilename();

        touch($file);

        return $this;
    }

    /**
     * Retorna o caminho do arquivo de banco de dados do Sqlite.
     *
     * @return string
     */
    public function getFilename() : string
    {
        return base_path("database/{$this->database}");
    }
}