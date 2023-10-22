<?php

namespace App\Repositories\CartaoCreditoRepository;

use App\Repositories\CartaoCreditoRepository\CartaoCreditoInterface;
use App\Repositories\RepoQueries;

class CartaoCreditoRepository extends RepoQueries implements CartaoCreditoInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    function create(array $data)
    {
        $sql = "INSERT INTO pizzaria.cartao_credito
        (nome, numero, expiracao, usuario_id)
        VALUES ($1, $2, $3, $4);";

        return $this->doQueryParams($sql, $data);
    }

    function update(array $data)
    {
        $sql = "UPDATE pizzaria.cartao_credito SET 
        nome = COALESCE($2, nome), 
        numero = COALESCE($3, numero),
        expiracao = COALESCE($4, expiracao),
        usuario_id = COALESCE($5, usuario_id)
        WHERE numero = $1;";

        return $this->doQueryParams($sql, $data);
    }

    function delete(string $id)
    {
        $sql = "DELETE FROM pizzaria.cartao_credito WHERE numero = $1;";

        return $this->doQueryParams($sql, array($id));
    }

    function find(string $id)
    {
        $sql = "SELECT * FROM pizzaria.cartao_credito WHERE numero = $1";

        return $this->getRowParams($sql, array($id));
    }

    function all()
    {
        $sql = "SELECT * FROM pizzaria.cartao_credito";

        return $this->getRows($sql);
    }
}

?>