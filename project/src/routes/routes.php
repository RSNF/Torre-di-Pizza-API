<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;

include_once "src/routes/pizzas.php";
include_once "src/routes/usuarios.php";
include_once "src/routes/bebidas.php";
include_once "src/routes/tamanhos.php";
include_once "src/routes/coberturas.php";
include_once "src/routes/cartoes.php";
include_once "src/routes/pedidos.php";
include_once "src/routes/coberturas_pizza.php";
include_once "src/routes/pedido_bebidas.php";
include_once "src/routes/pedido_pizzas.php";

$api_routes = function (RouteCollectorProxy $routes) {

    global $pizzas_routes;
    global $usuarios_routes;
    global $bebidas_routes;
    global $tamanhos_routes;
    global $coberturas_routes;
    global $cartoes_routes;
    global $pedidos_routes;
    global $coberturas_pizza_routes;
    global $pedido_bebidas_routes;
    global $pedido_pizzas_routes;

    $routes->get("/check", function (Request $request, Response $response, array $params) {

        $response->getBody()->write(json_encode("Accepted!"));
        $response = $response->withStatus(202);

        return $response;
    });

    $routes->group("/pizza", $pizzas_routes);
    $routes->group("/usuario", $usuarios_routes);
    $routes->group("/bebida", $bebidas_routes);
    $routes->group("/tamanho", $tamanhos_routes);
    $routes->group("/cobertura", $coberturas_routes);
    $routes->group("/cartao", $cartoes_routes);
    $routes->group("/pedido", $pedidos_routes);
    $routes->group("/cobertura-pizza", $coberturas_pizza_routes);
    $routes->group("/pedido-bebida", $pedido_bebidas_routes);
    $routes->group("/pedido-pizza", $pedido_pizzas_routes);
}

?>