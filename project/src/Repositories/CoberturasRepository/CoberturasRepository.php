<?php

namespace App\Repositories\CoberturasRepository;

use App\Repositories\CoberturasRepository\CoberturasInterface;
use App\Repositories\RepoQueries;

class CoberturasRepository extends RepoQueries implements CoberturasInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    function create(array $data)
    {
        $sql = "INSERT INTO pizzaria.coberturas
        (nome, preco)
        VALUES ($1, $2);";

        return $this->doQueryParams($sql, $data);
    }

    function update(array $data)
    {
        $sql = "UPDATE pizzaria.coberturas SET 
        nome = COALESCE($2, nome), 
        preco = COALESCE($3, preco)
        WHERE id = $1;";

        return $this->doQueryParams($sql, $data);
    }

    function delete(string $id)
    {
        $sql = "DELETE FROM pizzaria.coberturas WHERE id = $1;";

        return $this->doQueryParams($sql, array($id));
    }

    function find(string $id)
    {
        $sql = "SELECT * FROM pizzaria.coberturas WHERE id = $1";

        return $this->getRowParams($sql, array($id));
    }

    function all()
    {
        $sql = "SELECT * FROM pizzaria.coberturas";

        return $this->getRows($sql);
    }
}

?>