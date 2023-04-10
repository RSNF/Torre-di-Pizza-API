<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Services\CartaoCreditoServices;

class CartaoCreditoController {

    public function show(Request $request, Response $response, array $params) {

        $res = CartaoCreditoServices::show($request, $response, $params);

        return $res;
    }

    public function list(Request $request, Response $response, array $params) {

        $res = CartaoCreditoServices::list($request, $response, $params);

        return $res;
    }

    public function store(Request $request, Response $response, array $params) {

        $res = CartaoCreditoServices::store($request, $response, $params);

        return $res;
    }

    public function update(Request $request, Response $response, array $params) {

        $res = CartaoCreditoServices::update($request, $response, $params);

        return $res;
    }

    public function delete(Request $request, Response $response, array $params) {

        $res = CartaoCreditoServices::delete($request, $response, $params);

        return $res;
    }
}

?>