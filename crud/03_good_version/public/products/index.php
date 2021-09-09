<?php

use app\Router;
use app\controllers\ProductController;

require_once '../../vendor/autoload.php';

$database = new \app\Database();
$router = new Router($database);

$router = new Router();

$router->get('/', [ProductController::class, 'index']);
$router->get('/products', [ProductController::class, 'index']);
$router->get('/products/create', [ProductController::class, 'create']);
$router->post('/products/create', [ProductController::class, 'create']);
$router->get('/products/update', [ProductController::class, 'update']);
$router->post('/products/update', [ProductController::class, 'update']);
$router->post('/', [ProductController::class, 'delete']);

$router->resolve();
