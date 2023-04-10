<?php

use Slim\Routing\RouteCollectorProxy;
use App\Controllers\PedidosController;

$pedidos_routes = function (RouteCollectorProxy $pedidos) {
    
    $controller = new PedidosController;

    $pedidos->get("/", [$controller, "list"]);
    $pedidos->get("/{id}", [$controller, "show"]);
    $pedidos->post("/", [$controller, "store"]);
    $pedidos->put("/{id}", [$controller, "update"]);
    $pedidos->delete("/{id}", [$controller, "delete"]);
}

?>