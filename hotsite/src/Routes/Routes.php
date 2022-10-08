<?php

use CoffeeCode\Router\Router;

$router = new Router("http://localhost:8080/src/");

$router->namespace("Tlv\Hotsite\App\Controller");

$router->group("/")->namespace("Tlv\Hotsite\App\Controller");
$router->get("/", 'HomeController:index');
$router->get("/clientes", 'ClienteController:list');
$router->get("/home", 'HomeController:index');

$router->group("post")->namespace("Tlv\Hotsite\App\Controller");
$router->get("/", 'PostController:list');
$router->get("/{id}", 'PostController:single');


$router->dispatch();
