<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Services\PizzasServices;

class PizzasController {

    public function show(Request $request, Response $response, array $params) {

        $res = PizzasServices::show($request, $response, $params);

        return $res;
    }

    public function list(Request $request, Response $response, array $params) {

        $res = PizzasServices::list($request, $response, $params);

        return $res;
    }

    public function store(Request $request, Response $response, array $params) {

        $res = PizzasServices::store($request, $response, $params);

        return $res;
    }

    public function update(Request $request, Response $response, array $params) {

        $res = PizzasServices::update($request, $response, $params);

        return $res;
    }

    public function delete(Request $request, Response $response, array $params) {

        $res = PizzasServices::delete($request, $response, $params);

        return $res;
    }
}

?>