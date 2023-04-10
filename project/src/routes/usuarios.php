<?php

use Slim\Routing\RouteCollectorProxy;
use App\Controllers\UsuariosController;

$usuarios_routes = function (RouteCollectorProxy $usuarios) {

    $controller = new UsuariosController();

    $usuarios->get("/", [$controller, "list"]);
    $usuarios->get("/{id}", [$controller, "show"]);
    $usuarios->post("/", [$controller, "store"]);
    $usuarios->put("/{id}", [$controller, "update"]);
    $usuarios->delete("/{id}", [$controller, "delete"]);
}

?>