<?php

namespace App\Repositories\PedidoPizzasRepository;

use App\Repositories\PedidoPizzasRepository\PedidoPizzasInterface;
use App\Repositories\RepoQueries;

class PedidoPizzasRepository extends RepoQueries implements PedidoPizzasInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    function create(array $data)
    {
        $sql = "INSERT INTO pizzaria.pedido_tem_pizzas
        (pedido_id, pizza_id)
        VALUES ($1, $2);";

        return $this->doQueryParams($sql, $data);
    }

    function update(array $data)
    {
        $sql = "UPDATE pizzaria.pedido_tem_pizzas SET 
        pedido_id = COALESCE($2, pedido_id), 
        pizza_id = COALESCE($3, pizza_id)
        WHERE pedido_id = $1;";

        return $this->doQueryParams($sql, $data);
    }

    function delete(string $id)
    {
        $sql = "DELETE FROM pizzaria.pedido_tem_pizzas WHERE pedido_id = $1;";

        return $this->doQueryParams($sql, array($id));
    }

    function find(string $id)
    {
        $sql = "SELECT * FROM pizzaria.pedido_tem_pizzas WHERE pedido_id = $1";

        return $this->getRowParams($sql, array($id));
    }

    function all()
    {
        $sql = "SELECT * FROM pizzaria.pedido_tem_pizzas";

        return $this->getRows($sql);
    }
}

?>