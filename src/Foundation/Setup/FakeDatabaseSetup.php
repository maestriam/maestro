<?php

namespace Maestriam\Maestro\Foundation\Setup;

class FakeDatabaseSetup 
{
    private string $database = 'database.sqlite';

    private string $env = '.env';

    public function setup()
    {
        $this->touchDatabase();        
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