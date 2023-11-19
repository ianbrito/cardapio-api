<?php

namespace Cardapio\Core\Routing;

class Router implements RouterInterface
{

    private const HTTP_GET = 'GET';
    private const HTTP_POST = 'POST';

    private array $routes = [];

    public function get(string $path, $action)
    {
        $this->addRoute(self::HTTP_GET, $path, $action);
    }

    public function post(string $path, $action)
    {
        $this->addRoute(self::HTTP_POST, $path, $action);
    }

    public function put(string $path, $action)
    {
        // TODO: Implement put() method.
    }

    public function delete(string $path, $action)
    {
        // TODO: Implement delete() method.
    }

    private function addRoute(string $method, string $path, $action)
    {
        $tokens = [];
        $pattern = preg_replace_callback('/{([^}]+)}/', function ($match) use (&$tokens) {
            $tokens[] = $match[1];
            return '([^/]+)';
        }, $path);

        $pattern = str_replace('/', '\/', $pattern);
        $pattern = "/^{$pattern}$/";

        $this->routes[$method][$pattern] = ['action' => $action, 'tokens' => $tokens];
    }

    /**
     * @throws \Exception
     */
    public function dispatch(RequestInterface $request)
    {
        $path = $request->getPath();
        $method = $request->getMethod();

        foreach ($this->routes[$method] as $pattern => $route) {
            if (preg_match($pattern, $path, $matches)) {
                array_shift($matches);
                $params = array_combine($route['tokens'], $matches);
                if (is_array($route['action'])) {
                    $class = array_shift($route['action']);
                    $action = array_shift($route['action']);
                    call_user_func_array([new $class, $action], [...$params]);
                }
                return;
            }
        }
        
        header("HTTP/1.0 404 Not Found");
    }
}
