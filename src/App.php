<?php

namespace Cardapio;

use Cardapio\Core\Routing\Request;
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
        $request = new Request();
        $this->router->dispatch($request);
    }
}