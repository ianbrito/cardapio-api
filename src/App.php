<?php

namespace Cardapio;

use Cardapio\Core\Routing\Router;

class App
{
    public Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function run()
    {
        echo 'Running';
    }
}