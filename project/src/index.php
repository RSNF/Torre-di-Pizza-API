<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/my_autoload.php';

include_once "bootstrap.php";

include_once "routes/routes.php";

class MyApp {

    public \Slim\App $server;

    function __construct() {

        $this->server = AppFactory::create();
        $this->middlewares();
        $this->routes();
    }

    private function middlewares() {

        $this->server->addRoutingMiddleware();
    }

    private function routes() {

        global $api_routes;

        $this->server->group("/api", $api_routes);
    }
}

$myApp = new MyApp();
$myApp->server->run();

?>