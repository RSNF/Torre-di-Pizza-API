<?php

namespace App\Repositories\PizzasRepository;

use App\Repositories\RepoQueries;
use App\Repositories\PizzasRepository\PizzasInterface;

class PizzasRepository extends RepoQueries implements PizzasInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    function create(array $data)
    {
        $sql = "INSERT INTO pizzaria.pizzas
        (nome, tamanho_id, descricao)
        VALUES ($1, $2, $3);";

        return $this->doQueryParams($sql, $data);
    }

    function update(array $data)
    {
        $sql = "UPDATE pizzaria.pizzas SET 
        nome = COALESCE($2, nome), 
        tamanho_id = COALESCE($3, tamanho_id), 
        descricao = $4
        WHERE id = $1;";

        return $this->doQueryParams($sql, $data);
    }

    function delete(string $id)
    {
        $sql = "DELETE FROM pizzaria.pizzas WHERE id = $1;";

        return $this->doQueryParams($sql, array($id));
    }

    function find(string $id)
    {
        $sql = "SELECT * FROM pizzaria.pizzas WHERE id = $1";

        return $this->getRowParams($sql, array($id));
    }

    function all()
    {
        $sql = "SELECT * FROM pizzaria.pizzas";

        return $this->getRows($sql);
    }
}

?>