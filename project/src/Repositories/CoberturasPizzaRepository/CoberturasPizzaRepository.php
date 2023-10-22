<?php

namespace App\Repositories\CoberturasPizzasRepository;

use App\Repositories\CoberturasPizzasRepository\CoberturasPizzaInterface;
use App\Repositories\RepoQueries;

class CoberturasPizzaRepository extends RepoQueries implements CoberturasPizzaInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    function create(array $data)
    {
        $sql = "INSERT INTO pizzaria.coberturas_pizza
        (pizza_id, cobertura_id)
        VALUES ($1, $2);";

        return $this->doQueryParams($sql, $data);
    }

    function update(array $data)
    {
        $sql = "UPDATE pizzaria.coberturas_pizza SET 
        pizza_id = COALESCE($2, pizza_id), 
        cobertura_id = COALESCE($3, cobertura_id)
        WHERE pizza_id = $1;";

        return $this->doQueryParams($sql, $data);
    }

    function delete(string $id)
    {
        $sql = "DELETE FROM pizzaria.coberturas_pizza WHERE pizza_id = $1;";

        return $this->doQueryParams($sql, array($id));
    }

    function find(string $id)
    {
        $sql = "SELECT * FROM pizzaria.coberturas_pizza WHERE pizza_id = $1";

        return $this->getRowParams($sql, array($id));
    }

    function all()
    {
        $sql = "SELECT * FROM pizzaria.coberturas_pizza";

        return $this->getRows($sql);
    }
}

?>