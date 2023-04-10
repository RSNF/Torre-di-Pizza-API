<?php

use Slim\Routing\RouteCollectorProxy;
use App\Controllers\PedidoPizzasController;

$pedido_pizzas_routes = function (RouteCollectorProxy $pedido_pizzas) {
    
    $controller = new PedidoPizzasController;

    $pedido_pizzas->get("/", [$controller, "list"]);
    $pedido_pizzas->get("/{id}", [$controller, "show"]);
    $pedido_pizzas->post("/", [$controller, "store"]);
    $pedido_pizzas->put("/{id}", [$controller, "update"]);
    $pedido_pizzas->delete("/{id}", [$controller, "delete"]);
}

?>