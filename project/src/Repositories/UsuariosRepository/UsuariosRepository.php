<?php

namespace App\Repositories;

use RepoQueries;
use UsuariosInterface;

class UsuariosRepository extends RepoQueries implements UsuariosInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    function create(array $data)
    {
        $sql = "INSERT INTO pizzaria.usuario
        (nome, senha, tel, endereco)
        VALUES ($1, $2, $3, $4);";

        return $this->doQueryParams($sql, $data);
    }

    function update(array $data)
    {
        $sql = "UPDATE pizzaria.usuario SET 
        nome = COALESCE($2, nome), 
        senha = COALESCE($3, senha), 
        tel = COALESCE($4, tel),
        endereco = COALESCE($5, endereco)
        WHERE id = $1;";

        return $this->doQueryParams($sql, $data);
    }

    function delete(string $id)
    {
        $sql = "DELETE FROM pizzaria.usuario WHERE id = $1;";

        return $this->doQueryParams($sql, array($id));
    }

    function find(string $id)
    {
        $sql = "SELECT * FROM pizzaria.usuario WHERE id = $1";

        return $this->getRowParams($sql, array($id));
    }

    function all()
    {
        $sql = "SELECT * FROM pizzaria.usuario";

        return $this->getRows($sql);
    }
}

?>