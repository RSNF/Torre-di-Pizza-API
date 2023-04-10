<?php

use Slim\Routing\RouteCollectorProxy;
use App\Controllers\TamanhosController;

$tamanhos_routes = function (RouteCollectorProxy $tamanhos) {
    
    $controller = new TamanhosController;

    $tamanhos->get("/", [$controller, "list"]);
    $tamanhos->get("/{id}", [$controller, "show"]);
    $tamanhos->post("/", [$controller, "store"]);
    $tamanhos->put("/{id}", [$controller, "update"]);
    $tamanhos->delete("/{id}", [$controller, "delete"]);
}

?>