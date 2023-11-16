<?php

namespace Cardapio\Core\Routing;

interface RouterInterface
{
    public function get(string $path, $action);

    public function post(string $path, $action);

    public function put(string $path, $action);

    public function delete(string $path, $action);

}