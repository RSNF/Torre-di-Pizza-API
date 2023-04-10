<?php

use Slim\Routing\RouteCollectorProxy;
use App\Controllers\PedidoBebidasController;

$pedido_bebidas_routes = function (RouteCollectorProxy $pedido_bebidas) {
    
    $controller = new PedidoBebidasController;

    $pedido_bebidas->get("/", [$controller, "list"]);
    $pedido_bebidas->get("/{id}", [$controller, "show"]);
    $pedido_bebidas->post("/", [$controller, "store"]);
    $pedido_bebidas->put("/{id}", [$controller, "update"]);
    $pedido_bebidas->delete("/{pedido}/{bebida}", [$controller, "delete"]);
}

?>