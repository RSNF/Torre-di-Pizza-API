<?php

namespace App\Repositories;

class UsuariosRepository implements RepositoryInterface {
    
    static public function show(mixed $id) {

        global $dbconn;
        $sql = "SELECT * FROM pizzaria.usuario WHERE id = $1";

        $result = pg_query_params($dbconn, $sql, array($id));
        $linha = pg_fetch_assoc($result);

        return $linha;
    }

    static public function list() {

        global $dbconn;
        $sql = "SELECT * FROM pizzaria.usuario";

        $result = pg_query($dbconn, $sql);
        $linhas = pg_fetch_all($result);

        return $linhas;
    }

    static public function store(array $args) {

        $array = array_merge(
            array(
                "nome" => null,
                "senha" => null, 
                "tel" => null,
                "endereco" => null
            ), $args
        );
    
        list(
            "nome" => $nome, 
            "senha" => $senha,
            "tel" => $tel,
            "endereco" => $endereco
        ) = $array;
        
        global $dbconn;
        $sql = "INSERT INTO pizzaria.usuario (nome, senha, tel, endereco) VALUES ($1, $2, $3, $4);";
    
        $result = pg_query_params($dbconn, $sql, array($nome, $senha, $tel, $endereco));
    
        return ($result ? true : false);
    }

    static public function update(mixed $id, array $args) {

        $array = array_merge(
            array(
                "nome" => null,
                "senha" => null,
                "tel" => null,
                "endereco" => null
            ), $args
        );
    
        list(
            "nome" => $nome, 
            "senha" => $senha,
            "tel" => $tel,
            "endereco" => $endereco
        ) = $array;
    
        global $dbconn;
        $sql = "UPDATE pizzaria.usuario SET 
        nome = COALESCE($2, nome), 
        senha = COALESCE($3, senha), 
        tel = COALESCE($4, tel),
        endereco = COALESCE($5, endereco)
        WHERE id = $1;";
    
        $result = pg_query_params($dbconn, $sql, array($id, $nome, $senha, $tel, $endereco));
    
        return ($result ? true : false);
    }

    static public function delete(mixed $id) {

        global $dbconn;
        $sql = "DELETE FROM pizzaria.usuario WHERE id = $1;";
    
        $result = pg_query_params($dbconn, $sql, array($id));
    
        return ($result ? true : false);
    }
}

?>