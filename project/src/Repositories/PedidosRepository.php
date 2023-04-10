<?php

namespace App\Repositories;

class PedidosRepository implements RepositoryInterface {

    static public function show(mixed $id) {

        global $dbconn;
        $sql = "SELECT * FROM pizzaria.pedido WHERE id = $1";
    
        $result = pg_query_params($dbconn, $sql, array($id));
        $linha = pg_fetch_assoc($result);
    
        return $linha;
    }

    static public function list() {

        global $dbconn;
        $sql = "SELECT * FROM pizzaria.pedido";
    
        $result = pg_query($dbconn, $sql);
        $linhas = pg_fetch_all($result);
    
        return $linhas;
    }
    
    static public function store(array $args) {

        $array = array_merge(
            array(
                "preco_total" => null,
                "usuario_id" => null,
                "comentario" => null
            ), $args
        );
    
        list(
            "preco_total" => $preco_total, 
            "usuario_id" => $usuario_id,
            "comentario" => $comentario
        ) = $array;
        
        global $dbconn;
        $sql = "INSERT INTO pizzaria.pedido (preco_total, usuario_id, comentario) VALUES ($1, $2, $3);";
    
        $result = pg_query_params($dbconn, $sql, array($preco_total, $usuario_id, $comentario));
    
        return ($result ? true : false);
    }
    
    static public function update(mixed $id, array $args) {

        $array = array_merge(
            array(
                "preco_total" => null,
                "usuario_id" => null,
                "comentario" => null
            ), $args
        );
    
        list(
            "preco_total" => $preco_total, 
            "usuario_id" => $usuario_id,
            "comentario" => $comentario
        ) = $array;
    
        global $dbconn;
        $sql = "UPDATE pizzaria.pedido SET 
        preco_total = COALESCE($2, preco_total), 
        usuario_id = COALESCE($3, usuario_id),
        comentario = $4
        WHERE id = $1;";
    
        $result = pg_query_params($dbconn, $sql, array($id, $preco_total, $usuario_id, $comentario));
    
        return ($result ? true : false);
    }
    
    static public function delete(mixed $id) {

        global $dbconn;
        $sql = "DELETE FROM pizzaria.pedido WHERE id = $1;";
    
        $result = pg_query_params($dbconn, $sql, array($id));
    
        return ($result ? true : false);
    }
}

?>