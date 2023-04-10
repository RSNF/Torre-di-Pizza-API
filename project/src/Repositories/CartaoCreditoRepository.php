<?php

namespace App\Repositories;

class CartaoCreditoRepository implements RepositoryInterface {

    static public function show(mixed $pk) {

        global $dbconn;
        $sql = "SELECT * FROM pizzaria.cartao_credito WHERE numero = $1";
    
        $result = pg_query_params($dbconn, $sql, array($pk));
        $linha = pg_fetch_assoc($result);
    
        return $linha;
    }

    static public function list() {

        global $dbconn;
        $sql = "SELECT * FROM pizzaria.cartao_credito";
    
        $result = pg_query($dbconn, $sql);
        $linhas = pg_fetch_all($result);
    
        return $linhas;
    }
    
    static public function store(array $args) {

        $array = array_merge(
            array(
                "nome" => null,
                "numero" => null,
                "expiracao" => null,
                "usuario_id" => null
            ), $args
        );
    
        list(
            "nome" => $nome, 
            "numero" => $numero,
            "expiracao" => $expiracao,
            "usuario_id" => $usuario_id
        ) = $array;
        
        global $dbconn;
        $sql = "INSERT INTO pizzaria.cartao_credito (nome, numero, expiracao, usuario_id) VALUES ($1, $2, $3, $4);";
    
        $result = pg_query_params($dbconn, $sql, array($nome, $numero, $expiracao, $usuario_id));
    
        return ($result ? true : false);
    }
    
    static public function update(mixed $pk, array $args) {

        $array = array_merge(
            array(
                "nome" => null,
                "numero" => null,
                "expiracao" => null,
                "usuario_id" => null
            ), $args
        );
    
        list(
            "nome" => $nome, 
            "numero" => $numero,
            "expiracao" => $expiracao,
            "usuario_id" => $usuario_id
        ) = $array;
    
        global $dbconn;
        $sql = "UPDATE pizzaria.cartao_credito SET 
        nome = COALESCE($2, nome), 
        numero = COALESCE($3, numero),
        expiracao = COALESCE($4, expiracao),
        usuario_id = COALESCE($5, usuario_id)
        WHERE numero = $1;";

        print_r($array);
    
        $result = pg_query_params($dbconn, $sql, array($pk, $nome, $numero, $expiracao, $usuario_id));
    
        return ($result ? true : false);
    }
    
    static public function delete(mixed $pk) {

        global $dbconn;
        $sql = "DELETE FROM pizzaria.cartao_credito WHERE numero = $1;";
    
        $result = pg_query_params($dbconn, $sql, array($pk));
    
        return ($result ? true : false);
    }
}

?>