<?php

use Slim\Routing\RouteCollectorProxy;
use App\Controllers\CoberturasController;

$coberturas_routes = function (RouteCollectorProxy $coberturas) {
    
    $controller = new CoberturasController;

    $coberturas->get("/", [$controller, "list"]);
    $coberturas->get("/{id}", [$controller, "show"]);
    $coberturas->post("/", [$controller, "store"]);
    $coberturas->put("/{id}", [$controller, "update"]);
    $coberturas->delete("/{id}", [$controller, "delete"]);
}

?>