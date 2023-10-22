<?php

namespace App\Repositories\PedidosRepository;

use App\Repositories\PedidosRepository\PedidosInterface;
use App\Repositories\RepoQueries;

class PedidosRepository extends RepoQueries implements PedidosInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    function create(array $data)
    {
        $sql = "INSERT INTO pizzaria.pedido
        (preco_total, usuario_id, comentario)
        VALUES ($1, $2, $3);";

        return $this->doQueryParams($sql, $data);
    }

    function update(array $data)
    {
        $sql = "UPDATE pizzaria.pedido SET 
        preco_total = COALESCE($2, preco_total), 
        usuario_id = COALESCE($3, usuario_id),
        comentario = $4
        WHERE id = $1;";

        return $this->doQueryParams($sql, $data);
    }

    function delete(string $id)
    {
        $sql = "DELETE FROM pizzaria.pedido WHERE id = $1;";

        return $this->doQueryParams($sql, array($id));
    }

    function find(string $id)
    {
        $sql = "SELECT * FROM pizzaria.pedido WHERE id = $1";

        return $this->doQueryParams($sql, array($id));
    }

    function all()
    {
        $sql = "SELECT * FROM pizzaria.pedido";

        return $this->getRows($sql);
    }
}

?>