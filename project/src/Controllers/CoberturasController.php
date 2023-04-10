<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Services\CoberturasServices;

class CoberturasController {

    public function show(Request $request, Response $response, array $params) {

        $res = CoberturasServices::show($request, $response, $params);

        return $res;
    }

    public function list(Request $request, Response $response, array $params) {

        $res = CoberturasServices::list($request, $response, $params);

        return $res;
    }

    public function store(Request $request, Response $response, array $params) {

        $res = CoberturasServices::store($request, $response, $params);

        return $res;
    }

    public function update(Request $request, Response $response, array $params) {

        $res = CoberturasServices::update($request, $response, $params);

        return $res;
    }

    public function delete(Request $request, Response $response, array $params) {

        $res = CoberturasServices::delete($request, $response, $params);

        return $res;
    }
}

?>