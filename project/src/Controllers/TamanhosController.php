<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Services\TamanhosServices;

class TamanhosController {

    public function show(Request $request, Response $response, array $params) {

        $res = TamanhosServices::show($request, $response, $params);

        return $res;
    }

    public function list(Request $request, Response $response, array $params) {

        $res = TamanhosServices::list($request, $response, $params);

        return $res;
    }

    public function store(Request $request, Response $response, array $params) {

        $res = TamanhosServices::store($request, $response, $params);

        return $res;
    }

    public function update(Request $request, Response $response, array $params) {

        $res = TamanhosServices::update($request, $response, $params);

        return $res;
    }

    public function delete(Request $request, Response $response, array $params) {

        $res = TamanhosServices::delete($request, $response, $params);

        return $res;
    }
}

?>