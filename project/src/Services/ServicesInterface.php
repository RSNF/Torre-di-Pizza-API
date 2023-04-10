<?php

namespace App\Services;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

interface ServicesInterface {

    static public function show(Request $request, Response $response, array $params);
    static public function list(Request $request, Response $response, array $params);
    static public function store(Request $request, Response $response, array $params);
    static public function update(Request $request, Response $response, array $params);
    static public function delete(Request $request, Response $response, array $params);
}

?>