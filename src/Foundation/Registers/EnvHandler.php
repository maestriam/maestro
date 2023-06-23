<?php

namespace Maestriam\Maestro\Foundation\Registers;

use Maestriam\Maestro\Exceptions\EnvNotFoundException;

class EnvHandler
{
    protected $filename;

    public function __construct()
    {
        if (! $this->exists()) {
            $this->initEnv();
        }
    }
    
    /**
     * Cria um novo arquivo de configurações do ambiente do projeto
     *
     * @param  string $custom
     * @return integer
     */
    public function initEnv() : int
    {        
        return touch($this->file());
    }

    /**
     * Retorna o nome do arquivo de configurações de ambiente do projeto
     *
     * @return string
     */
    public function file() : string
    {
        $file = '.env';

        return base_path($file);
    }

    /**
     * Grava chave e valor no arquivo .env do projeto.
     *
     * @param  string $key
     * @param  string $value
     * @return void
     */
    public function set(string $key, string $value)
    {
        $line = $this->existsKey($key);

        if ($line == null) {
            return $this->append($key, $value);
        }

        return $this->change($line, $key, $value);
    }

    /**
     * Retorna o valor de uma chave dentro .env
     *
     * @param  string $key
     * @return string|null
     */
    public function get(string $key) : ?string
    {
        $no = $this->existsKey($key);

        if ($no === null) { 
            return null;
        }

        $lines = $this->lines();

        $pieces = explode('=', $lines[$no]);

        return $pieces[1];
    }

    /**
     * Verifica se uma chave existe no arquivo de .env
     * Se existir, retorna seu índice dentro do array
     * Caso contrário, nulo
     *
     * @param  string $key
     * @return integer|null
     */
    public function existsKey(string $key) : ?int
    {
        $search  = null;
        $lines   = $this->lines();
        $pattern = strtoupper('/'. $key . '=/');

        if (empty($lines)) { return null;
        }

        foreach($lines as $no => $line) {
            if (preg_match($pattern, $line)) {
                $search = $no;
            }
        }

        return $search;
    }

    /**
     * Retorna todas as linhas do arquivo de configuração
     * dividas em um array
     *
     * @return array
     */
    private function lines() : array
    {
        $content = $this->content();

        return explode("\n", $content);
    }

    /**
     * Verifica se o arquivo .env está configurado
     * corretamente na base do projeto
     *
     * @return void
     */
    public function exists() : bool
    {
        return is_file($this->file());
    }

    /**
     * Retorna o conteúdo do arquivo .env
     *
     * @return string
     */
    public function content() : string
    {
        if (! $this->exists()) {
            throw new EnvNotFoundException();
        }

        return file_get_contents($this->file());
    }

    /**
     * Adiciona uma nova chave no arquivo .env
     *
     * @param  string $key
     * @param  string $value
     * @return void
     */
    private function append(string $key, string $value)
    {
        $lines   = $this->lines();
        $content = strtoupper($key) . '=' . $value;
        $lines[] = $content;

        return $this->store($lines);
    }

    /**
     * Substitui o valor de uma chave existente
     * no arquivo .env
     *
     * @param  string $key
     * @param  string $value
     * @return void
     */
    private function change(int $line, string $key, string $value)
    {
        $lines = $this->lines();
        $content = strtoupper($key) . '=' . $value;

        $lines[$line] = $content;

        return $this->store($lines);
    }

    public function remove(string $key)
    {
        $line = $this->existsKey($key);

        if ($line == null) return;        

        $lines = $this->lines();
        
        unset($lines[$line]);

        return $this->store($lines);
    }

    /**
     * Salva as mudanças de conteúdo no arquivo .env
     *
     * @param  array $lines
     * @return bool|int
     */
    private function store(array $lines) : bool|int
    {
        $content = implode("\n", $lines);

        return file_put_contents($this->file(), $content);
    }
}
