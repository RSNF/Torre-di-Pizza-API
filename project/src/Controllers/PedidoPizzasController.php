<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Services\PedidoPizzasServices;

class PedidoPizzasController {

    public function show(Request $request, Response $response, array $params) {

        $res = PedidoPizzasServices::show($request, $response, $params);

        return $res;
    }

    public function list(Request $request, Response $response, array $params) {

        $res = PedidoPizzasServices::list($request, $response, $params);

        return $res;
    }

    public function store(Request $request, Response $response, array $params) {

        $res = PedidoPizzasServices::store($request, $response, $params);

        return $res;
    }

    public function update(Request $request, Response $response, array $params) {

        $res = PedidoPizzasServices::update($request, $response, $params);

        return $res;
    }

    public function delete(Request $request, Response $response, array $params) {

        $res = PedidoPizzasServices::delete($request, $response, $params);

        return $res;
    }
}

?>