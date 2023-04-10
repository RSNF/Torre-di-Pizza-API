<?php

namespace App\Repositories;

interface RepositoryInterface {

    static public function show(mixed $pk);
    static public function list();
    static public function store(array $args);
    static public function update(mixed $pk, array $args);
    static public function delete(mixed $pk);
}

?>