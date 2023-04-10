<?php

spl_autoload_register(function ($class) {

    // define o diretório base do seu projeto
    $baseDir = __DIR__ . '/';

    // mapeamento dos namespaces para diretórios
    $namespaceMap = [
        'App\Services' => 'Services/',
        'App\Repositories' => 'Repositories/',
        'App\Controllers' => 'Controllers/',
    ];

    // percorre o mapeamento procurando o namespace da classe
    foreach ($namespaceMap as $namespace => $dir) {
        
        if (strpos($class, $namespace) === 0) {
        
            // obtém o caminho da classe relativo ao diretório base
            $path = $dir . str_replace('\\', '/', substr($class, strlen($namespace))) . '.php';
            
            // monta o caminho completo do arquivo da classe
            $file = $baseDir . $path;

            // se o arquivo existe, inclui a classe
            if (file_exists($file)) {

                require_once $file;
                break;
            }
        }
    }
});

?>