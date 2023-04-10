<?php

use Slim\Routing\RouteCollectorProxy;
use App\Controllers\CoberturasPizzaController;

$coberturas_pizza_routes = function (RouteCollectorProxy $coberturas_pizza) {
    
    $controller = new CoberturasPizzaController;

    $coberturas_pizza->get("/", [$controller, "list"]);
    $coberturas_pizza->get("/{id}", [$controller, "show"]);
    $coberturas_pizza->post("/", [$controller, "store"]);
    $coberturas_pizza->put("/{id}", [$controller, "update"]);
    $coberturas_pizza->delete("/{id}", [$controller, "delete"]);
}

?>