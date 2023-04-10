<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Services\UsuariosServices;

class UsuariosController {

    public function show(Request $request, Response $response, array $params) {

        $res = UsuariosServices::show($request, $response, $params);

        return $res;
    }

    public function list(Request $request, Response $response, array $params) {

        $res = UsuariosServices::list($request, $response, $params);

        return $res;
    }

    public function store(Request $request, Response $response, array $params) {

        $res = UsuariosServices::store($request, $response, $params);

        return $res;
    }

    public function update(Request $request, Response $response, array $params) {

        $res = UsuariosServices::update($request, $response, $params);
        
        return $res;
    }

    public function delete(Request $request, Response $response, array $params) {

        $res = UsuariosServices::delete($request, $response, $params);

        return $res;
    }
}

?>