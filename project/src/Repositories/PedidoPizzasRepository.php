<?php

namespace App\Repositories;

class PedidoPizzasRepository implements RepositoryInterface {

    static public function show(mixed $id) {

        global $dbconn;
        $sql = "SELECT * FROM pizzaria.pedido_tem_pizzas WHERE pedido_id = $1";
    
        $result = pg_query_params($dbconn, $sql, array($id));
        $linha = pg_fetch_assoc($result);
    
        return $linha;
    }

    static public function list() {

        global $dbconn;
        $sql = "SELECT * FROM pizzaria.pedido_tem_pizzas";
    
        $result = pg_query($dbconn, $sql);
        $linhas = pg_fetch_all($result);
    
        return $linhas;
    }
    
    static public function store(array $args) {

        $array = array_merge(
            array(
                "pedido_id" => null,
                "pizza_id" => null
            ), $args
        );
    
        list(
            "pedido_id" => $pedido_id, 
            "pizza_id" => $pizza_id
        ) = $array;
        
        global $dbconn;
        $sql = "INSERT INTO pizzaria.pedido_tem_pizzas (pedido_id, pizza_id) VALUES ($1, $2);";
    
        $result = pg_query_params($dbconn, $sql, array($pedido_id, $pizza_id));
    
        return ($result ? true : false);
    }
    
    static public function update(mixed $id, array $args) {

        $array = array_merge(
            array(
                "pedido_id" => null,
                "pizza_id" => null
            ), $args
        );
    
        list(
            "pedido_id" => $pedido_id, 
            "pizza_id" => $pizza_id
        ) = $array;
    
        global $dbconn;
        $sql = "UPDATE pizzaria.pedido_tem_pizzas SET 
        pedido_id = COALESCE($2, pedido_id), 
        pizza_id = COALESCE($3, pizza_id)
        WHERE pedido_id = $1;";
    
        $result = pg_query_params($dbconn, $sql, array($id, $pedido_id, $pizza_id));
    
        return ($result ? true : false);
    }
    
    static public function delete(mixed $id) {

        global $dbconn;
        $sql = "DELETE FROM pizzaria.pedido_tem_pizzas WHERE pedido_id = $1;";
    
        $result = pg_query_params($dbconn, $sql, array($id));
    
        return ($result ? true : false);
    }
}

?>