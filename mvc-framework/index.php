<?php

require_once './core/App.php';

$app = new App();

$app->router->get('/', function() {
    return 'Hello world';
});

$app->run();