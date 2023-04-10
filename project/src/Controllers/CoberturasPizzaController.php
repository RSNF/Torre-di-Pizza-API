<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Services\CoberturasPizzaServices;

class CoberturasPizzaController {

    public function show(Request $request, Response $response, array $params) {

        $res = CoberturasPizzaServices::show($request, $response, $params);

        return $res;
    }

    public function list(Request $request, Response $response, array $params) {

        $res = CoberturasPizzaServices::list($request, $response, $params);

        return $res;
    }

    public function store(Request $request, Response $response, array $params) {

        $res = CoberturasPizzaServices::store($request, $response, $params);

        return $res;
    }

    public function update(Request $request, Response $response, array $params) {

        $res = CoberturasPizzaServices::update($request, $response, $params);

        return $res;
    }

    public function delete(Request $request, Response $response, array $params) {

        $res = CoberturasPizzaServices::delete($request, $response, $params);

        return $res;
    }
}

?>