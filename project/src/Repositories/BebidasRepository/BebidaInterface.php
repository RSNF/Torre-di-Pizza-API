<?php

namespace App\Repositories\BebidaRepository;

use App\Models\Bebida;

interface BebidaInterface
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
    public function delete(string $id);

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