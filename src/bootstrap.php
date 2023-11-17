<?php

use Cardapio\App;

$app = new App();

$app->router->get('/api/v1/cardapio', [App\Controllers\CardapioController::class, 'index']);
$app->router->post('/api/v1/cardapio', [App\Controllers\CardapioController::class, 'store']);

$app->router->get('/api/v1/usuario', [App\Controllers\UsuarioController::class, 'index']);
$app->router->get('/api/v1/loja', [App\Controllers\LojaController::class, 'index']);


$app->run();