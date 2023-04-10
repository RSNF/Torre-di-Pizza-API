<?php

use Slim\Routing\RouteCollectorProxy;
use App\Controllers\CartaoCreditoController;

$cartoes_routes = function (RouteCollectorProxy $cartoes) {
    
    $controller = new CartaoCreditoController;

    $cartoes->get("/", [$controller, "list"]);
    $cartoes->get("/{numero}", [$controller, "show"]);
    $cartoes->post("/", [$controller, "store"]);
    $cartoes->put("/{numero}", [$controller, "update"]);
    $cartoes->delete("/{numero}", [$controller, "delete"]);
}

?>