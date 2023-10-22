<?php

namespace App\Repositories;

use PedidoBebidasInterface;
use RepoQueries;

class PedidoBebidasRepository extends RepoQueries implements PedidoBebidasInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    function create(array $data)
    {
        $sql = "INSERT INTO pizzaria.pedido_tem_bebidas
        (pedido_id, bebida_id)
        VALUES ($1, $2);";

        return $this->doQueryParams($sql, $data);
    }

    function update(array $data)
    {
        $sql = "UPDATE pizzaria.pedido_tem_bebidas SET 
        pedido_id = COALESCE($2, pedido_id), 
        bebida_id = COALESCE($3, bebida_id)
        WHERE pedido_id = $1;";

        return $this->doQueryParams($sql, $data);
    }

    function delete(array $data)
    {
        $sql = "DELETE FROM pizzaria.pedido_tem_bebidas 
        WHERE pedido_id = $1 AND bebida_id = $2 LIMIT 1;";

        return $this->doQueryParams($sql, $data);
    }

    function find(string $id)
    {
        $sql = "SELECT * FROM pizzaria.pedido_tem_bebidas WHERE pedido_id = $1";

        return $this->getRowParams($sql, array($id));
    }

    function all()
    {
        $sql = "SELECT * FROM pizzaria.pedido_tem_bebidas";

        return $this->getRows($sql);
    }
}

?>