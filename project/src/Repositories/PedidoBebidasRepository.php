<?php

namespace App\Repositories;

class PedidoBebidasRepository implements RepositoryInterface {

    static public function show(mixed $id) {

        global $dbconn;
        $sql = "SELECT * FROM pizzaria.pedido_tem_bebidas WHERE pedido_id = $1";
    
        $result = pg_query_params($dbconn, $sql, array($id));
        $linha = pg_fetch_assoc($result);
    
        return $linha;
    }

    static public function list() {

        global $dbconn;
        $sql = "SELECT * FROM pizzaria.pedido_tem_bebidas";
    
        $result = pg_query($dbconn, $sql);
        $linhas = pg_fetch_all($result);
    
        return $linhas;
    }
    
    static public function store(array $args) {

        $array = array_merge(
            array(
                "pedido_id" => null,
                "bebida_id" => null
            ), $args
        );
    
        list(
            "pedido_id" => $pedido_id, 
            "bebida_id" => $bebida_id
        ) = $array;
        
        global $dbconn;
        $sql = "INSERT INTO pizzaria.pedido_tem_bebidas (pedido_id, bebida_id) VALUES ($1, $2);";
    
        $result = pg_query_params($dbconn, $sql, array($pedido_id, $bebida_id));
    
        return ($result ? true : false);
    }
    
    static public function update(mixed $id, array $args) {

        $array = array_merge(
            array(
                "pedido_id" => null,
                "bebida_id" => null
            ), $args
        );
    
        list(
            "pedido_id" => $pedido_id, 
            "bebida_id" => $bebida_id
        ) = $array;
    
        global $dbconn;
        $sql = "UPDATE pizzaria.pedido_tem_bebidas SET 
        pedido_id = COALESCE($2, pedido_id), 
        bebida_id = COALESCE($3, bebida_id)
        WHERE pedido_id = $1;";
    
        $result = pg_query_params($dbconn, $sql, array($id, $pedido_id, $bebida_id));
    
        return ($result ? true : false);
    }
    
    static public function delete(mixed $id) {

        global $dbconn;
        $sql = "DELETE FROM pizzaria.pedido_tem_bebidas WHERE pedido_id = $1 AND bebida_id = $2 LIMIT 1;";
    
        $result = pg_query_params($dbconn, $sql, array($id));
    
        return ($result ? true : false);
    }
}

?>