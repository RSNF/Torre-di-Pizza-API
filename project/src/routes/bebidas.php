<?php

use Slim\Routing\RouteCollectorProxy;
use App\Controllers\BebidasController;

$bebidas_routes = function (RouteCollectorProxy $bebidas) {
    
    $controller = new BebidasController;

    $bebidas->get("/", [$controller, "list"]);
    $bebidas->get("/{id}", [$controller, "show"]);
    $bebidas->post("/", [$controller, "store"]);
    $bebidas->put("/{id}", [$controller, "update"]);
    $bebidas->delete("/{id}", [$controller, "delete"]);
}

?>