<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Services\PedidoBebidasServices;

class PedidoBebidasController {

    public function show(Request $request, Response $response, array $params) {

        $res = PedidoBebidasServices::show($request, $response, $params);

        return $res;
    }

    public function list(Request $request, Response $response, array $params) {

        $res = PedidoBebidasServices::list($request, $response, $params);

        return $res;
    }

    public function store(Request $request, Response $response, array $params) {

        $res = PedidoBebidasServices::store($request, $response, $params);

        return $res;
    }

    public function update(Request $request, Response $response, array $params) {

        $res = PedidoBebidasServices::update($request, $response, $params);

        return $res;
    }

    public function delete(Request $request, Response $response, array $params) {

        $res = PedidoBebidasServices::delete($request, $response, $params);

        return $res;
    }
}

?>