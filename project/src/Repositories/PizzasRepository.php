<?php

namespace App\Repositories;

class PizzasRepository implements RepositoryInterface {

    static public function show(mixed $id) {

        global $dbconn;
        $sql = "SELECT * FROM pizzaria.pizzas WHERE id = $1";
    
        $result = pg_query_params($dbconn, $sql, array($id));
        $linha = pg_fetch_assoc($result);
    
        return $linha;
    }

    static public function list() {

        global $dbconn;
        $sql = "SELECT * FROM pizzaria.pizzas";
    
        $result = pg_query($dbconn, $sql);
        $linhas = pg_fetch_all($result);
    
        return $linhas;
    }
    
    static public function store(array $args) {

        $array = array_merge(
            array(
                "nome" => null,
                "tamanho_id" => null, 
                "descricao" => null
            ), $args
        );
    
        list(
            "nome" => $nome, 
            "tamanho_id" => $tamanho_id,
            "descricao" => $descricao
        ) = $array;
        
        global $dbconn;
        $sql = "INSERT INTO pizzaria.pizzas (nome, tamanho_id, descricao) VALUES ($1, $2, $3);";
    
        $result = pg_query_params($dbconn, $sql, array($nome, $tamanho_id, $descricao));
    
        return ($result ? true : false);
    }
    
    static public function update(mixed $id, array $args) {

        $array = array_merge(
            array(
                "nome" => null,
                "tamanho_id" => null, 
                "descricao" => null
            ), $args
        );
    
        list(
            "nome" => $nome, 
            "tamanho_id" => $tamanho_id,
            "descricao" => $descricao
        ) = $array;
    
        global $dbconn;
        $sql = "UPDATE pizzaria.pizzas SET 
        nome = COALESCE($2, nome), 
        tamanho_id = COALESCE($3, tamanho_id), 
        descricao = $4
        WHERE id = $1;";
    
        $result = pg_query_params($dbconn, $sql, array($id, $nome, $tamanho_id, $descricao));
    
        return ($result ? true : false);
    }
    
    static public function delete(mixed $id) {

        global $dbconn;
        $sql = "DELETE FROM pizzaria.pizzas WHERE id = $1;";
    
        $result = pg_query_params($dbconn, $sql, array($id));
    
        return ($result ? true : false);
    }
}

?>