<?php

namespace Cardapio\Core\Routing;

class Router implements RouterInterface
{

    private const HTTP_GET = 'GET';
    private const HTTP_POST = 'POST';

    private array $routes = [];
    private array $paths = [];


    public function get(string $path, $action)
    {
        $this->routes[self::HTTP_GET][$path] = $action;
        array_push($this->paths, $path);
    }

    public function post(string $path, $action)
    {
        $this->routes[self::HTTP_POST][$path] = $action;
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
            call_user_func_array([new $class, $action], [array_merge($_GET, $_POST)]);
        }
    }
}