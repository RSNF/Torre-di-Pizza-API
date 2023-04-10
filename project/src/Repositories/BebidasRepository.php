<?php

namespace App\Repositories;

class BebidasRepository implements RepositoryInterface {

    static public function show(mixed $id) {

        global $dbconn;
        $sql = "SELECT * FROM pizzaria.bebidas WHERE id = $1";
    
        $result = pg_query_params($dbconn, $sql, array($id));
        $linha = pg_fetch_assoc($result);
    
        return $linha;
    }

    static public function list() {

        global $dbconn;
        $sql = "SELECT * FROM pizzaria.bebidas";
    
        $result = pg_query($dbconn, $sql);
        $linhas = pg_fetch_all($result);
    
        return $linhas;
    }
    
    static public function store(array $args) {

        $array = array_merge(
            array(
                "nome" => null,
                "preco" => null
            ), $args
        );
    
        list(
            "nome" => $nome, 
            "preco" => $preco
        ) = $array;
        
        global $dbconn;
        $sql = "INSERT INTO pizzaria.bebidas (nome, preco) VALUES ($1, $2);";
    
        $result = pg_query_params($dbconn, $sql, array($nome, $preco));
    
        return ($result ? true : false);
    }
    
    static public function update(mixed $id, array $args) {

        $array = array_merge(
            array(
                "nome" => null,
                "preco" => null
            ), $args
        );
    
        list(
            "nome" => $nome, 
            "preco" => $preco
        ) = $array;
    
        global $dbconn;
        $sql = "UPDATE pizzaria.bebidas SET 
        nome = COALESCE($2, nome), 
        preco = COALESCE($3, preco)
        WHERE id = $1;";
    
        $result = pg_query_params($dbconn, $sql, array($id, $nome, $preco));
    
        return ($result ? true : false);
    }
    
    static public function delete(mixed $id) {

        global $dbconn;
        $sql = "DELETE FROM pizzaria.bebidas WHERE id = $1;";
    
        $result = pg_query_params($dbconn, $sql, array($id));
    
        return ($result ? true : false);
    }
}

?>