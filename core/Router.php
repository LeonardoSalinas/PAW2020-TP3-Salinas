<?php

namespace App\core;

class Router
{
    public $routes = [];

    function define($routes)
    {
        $this->routes = $routes;
    }

    function direct($path, $method)
    {
        $operation = $this->routes["$method $path"];
        list($class, $method) = explode('@', $operation);
        $fullClass = "App\controllers\\$class";
        $controller = new $fullClass;
        $controller->$method();
    }
}
