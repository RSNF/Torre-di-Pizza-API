<?php

namespace App\Repositories;

class CoberturasPizzaRepository implements RepositoryInterface {

    static public function show(mixed $id) {

        global $dbconn;
        $sql = "SELECT * FROM pizzaria.coberturas_pizza WHERE pizza_id = $1";
    
        $result = pg_query_params($dbconn, $sql, array($id));
        $linha = pg_fetch_assoc($result);
    
        return $linha;
    }

    static public function list() {

        global $dbconn;
        $sql = "SELECT * FROM pizzaria.coberturas_pizza";
    
        $result = pg_query($dbconn, $sql);
        $linhas = pg_fetch_all($result);
    
        return $linhas;
    }
    
    static public function store(array $args) {

        $array = array_merge(
            array(
                "pizza_id" => null,
                "cobertura_id" => null
            ), $args
        );
    
        list(
            "pizza_id" => $pizza_id, 
            "cobertura_id" => $cobertura_id
        ) = $array;
        
        global $dbconn;
        $sql = "INSERT INTO pizzaria.coberturas_pizza (pizza_id, cobertura_id) VALUES ($1, $2);";
    
        $result = pg_query_params($dbconn, $sql, array($pizza_id, $cobertura_id));
    
        return ($result ? true : false);
    }
    
    static public function update(mixed $id, array $args) {

        $array = array_merge(
            array(
                "pizza_id" => null,
                "cobertura_id" => null
            ), $args
        );
    
        list(
            "pizza_id" => $pizza_id, 
            "cobertura_id" => $cobertura_id
        ) = $array;
    
        global $dbconn;
        $sql = "UPDATE pizzaria.coberturas_pizza SET 
        pizza_id = COALESCE($2, pizza_id), 
        cobertura_id = COALESCE($3, cobertura_id)
        WHERE pizza_id = $1;";
    
        $result = pg_query_params($dbconn, $sql, array($id, $pizza_id, $cobertura_id));
    
        return ($result ? true : false);
    }
    
    static public function delete(mixed $id) {

        global $dbconn;
        $sql = "DELETE FROM pizzaria.coberturas_pizza WHERE pizza_id = $1;";
    
        $result = pg_query_params($dbconn, $sql, array($id));
    
        return ($result ? true : false);
    }
}

?>