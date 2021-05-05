<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Chave de aplicação
    |--------------------------------------------------------------------------
    |
    | Aqui é onde é encontrado todas as informações básicas para utilização
    | do pacote Maestria/Forge.
    | Você pode ter mais de uma chave de aplicação dependendo da necessidade
    | da sua aplicação, desde que mantenha a mesma estrutura e nomes de chaves
    | iguais do item padrão abaixo. 
    |
    */

    'maestro' => [
        

        'folders' => [
            'seed' => 'Database/Seeders/'            
        ],

        /*
        |--------------------------------------------------------------------------
        | Diretório-raiz para criação de arquivos
        |--------------------------------------------------------------------------
        |
        | Aqui é configurado onde os arquivos serão inseridos depois de criado.
        | Caso o caminho não exista, o Maestriam/Forge irá criar o diretório automaticamente.
        | O caminho não deve ter barras no final.
        |
        */

        'root_folder' => base_path('maestro'),
        
        /*
        |--------------------------------------------------------------------------
        | Diretório de templates
        |--------------------------------------------------------------------------
        |
        | Aqui onde é indicado onde ficam os arquivos que serão utilizados como molde
        | dentro da aplicação.
        | Os arquivos de template devem ter a extensão .stub para serem identificados.
        | O caminho não deve ter barras no final.
        |
        */

        'template_folder' => __DIR__ . '/../../templates/',



        'migration_folder' => 'Database/Migrations/',
        
        /*
        |--------------------------------------------------------------------------
        | Estrutura de diretório
        |--------------------------------------------------------------------------
        |
        | Aqui onde é configurado a estrutura de sub-divisões de pasta.
        |
        | Cada chave é o nome do arquivo de template, sem a extensão ".stub".        
        | Caso queira deixar genérico arquivos com nomes semelhantes, basta colocar um * 
        | na onde varia o nome do arquivo
        |
        | Cada valor corresponde o nome do diretório que o arquivo ficará alocado 
        | na hora da criação. 
        | O caminho é definido pelo valor inserido na chave "root_folder" + sub-diretório
        | Se o sub-diretório não existir, ele será criado automáticamente pelo pacote.
        | 
        |
        */

        'structure' => [            
            'json-*'       => '.',
            'provider-*'   => 'Providers/',            
            'route.*'      => 'Routes/',
            'controller-*' => 'Http/Controllers/',
            'file-config'  => 'Config/',
            'view-*'       => 'Resources/views/',
            'model-*'      => 'Entities/',
            'migration-*'  => 'Database/Migrations/',
            'seed-*'       => 'Database/Seeders/',
            'factory-*'    => 'Database/Factories/'
        ]
    ]
];