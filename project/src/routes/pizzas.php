<?php

use Slim\Routing\RouteCollectorProxy;
use App\Controllers\PizzasController;

$pizzasController = new PizzasController;

$pizzas_routes = function (RouteCollectorProxy $pizzas) {

    global $pizzasController;

    $pizzas->get("/", [$pizzasController, "list"]);
    $pizzas->get("/{id}", [$pizzasController, "show"]);
    $pizzas->post("/", [$pizzasController, "store"]);
    $pizzas->put("/{id}", [$pizzasController, "update"]);
    $pizzas->delete("/{id}", [$pizzasController, "delete"]);
}

?>