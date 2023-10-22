<?php

namespace App\Repositories;

use RepoQueries;
use TamanhosInterface;

class TamanhosRepository extends RepoQueries implements TamanhosInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    function create(array $data)
    {
        $sql = "INSERT INTO pizzaria.tamanhos
        (nome, preco)
        VALUES ($1, $2);";

        return $this->doQueryParams($sql, $data);
    }

    function update(array $data)
    {
        $sql = "UPDATE pizzaria.tamanhos SET 
        nome = COALESCE($2, nome), 
        preco = COALESCE($3, preco) 
        WHERE id = $1;";

        return $this->doQueryParams($sql, $data);
    }

    function delete(string $id)
    {
        $sql = "DELETE FROM pizzaria.tamanhos WHERE id = $1;";

        return $this->doQueryParams($sql, array($id));
    }

    function find(string $id)
    {
        $sql = "SELECT * FROM pizzaria.tamanhos WHERE id = $1";

        return $this->getRowParams($sql, array($id));
    }

    function all()
    {
        $sql = "SELECT * FROM pizzaria.tamanhos";

        return $this->getRows($sql);
    }
}

?>