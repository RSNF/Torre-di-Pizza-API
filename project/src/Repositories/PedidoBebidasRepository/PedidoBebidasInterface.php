<?php

namespace App\Repositories\PedidoBebidasRepository;

interface PedidoBebidasInterface
{
    /**
     * @param array $data
     * @return bool
     */
    public function create(array $data);

    /**
     * @param array $data
     * @return bool
     */
    public function update(array $data);

    /**
     * @param string $id
     * @return bool
     */
    public function delete(array $data);

    /**
     * @param string $id
     * @return array
     */
    public function find(string $id);

    /**
     * @return array
     */
    public function all();
}

?>