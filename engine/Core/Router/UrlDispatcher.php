<?php

namespace Engine\Core\Router;

class UrlDispatcher
{
    private $methods = [
        'GET',
        'POST'
    ];

    private $routes = [
        'GET' => [],
        'POST' => []
    ];

    private $patterns = [
        'int' => '[0-9]+',
        'str' => '[a-zA-Z\.\-_%]+',
        'any' => '[a-zA-Z0-9\.\-_%]+',
    ];

    public function addPattern($key, $pattern)
    {
        $this->patterns[$key] = $pattern;
    }

    public function routes($method)
    {
        return isset($this->routes[$method]) ? $this->routes[$method] : [];
    }
    public function dispatch($method, $uri)
    {
        $routes = $this->routes(strtoupper($method));

        if(array_key_exists($uri, $routes)){
            return new DispatchedRouter($routes[$uri]);
        }
    }
}