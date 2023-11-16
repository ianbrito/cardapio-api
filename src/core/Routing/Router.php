<?php

namespace Cardapio\Core\Routing;

class Router implements RouterInterface
{
    private const HTTP_GET = 'GET';

    private array $routes = [];

    public function get(string $path, $action)
    {
        $this->routes[self::HTTP_GET][$path] = $action;
    }

    public function post(string $path, $action)
    {
        // TODO: Implement post() method.
    }

    public function put(string $path, $action)
    {
        // TODO: Implement put() method.
    }

    public function delete(string $path, $action)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @throws \Exception
     */
    public function dispatch(RequestInterface $request)
    {
        $path = $request->getPath();
        $method = $request->getMethod();

        $callback = $this->routes[$method][$path] ?? null;

        if (!$callback) {
            header("HTTP/1.0 404 Not Found");
            return;
        }

        if (is_array($callback)) {
            $class = array_shift($callback);
            $action = array_shift($callback);
            call_user_func_array([new $class, $action], array());
        }
    }
}