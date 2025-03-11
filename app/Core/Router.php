<?php
namespace App\Core;

use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

class Router
{
    private string $modulesDir;

    public function __construct(string $modulesDir)
    {
        $this->modulesDir = rtrim($modulesDir, '/');
    }

    public function dispatch(): void
    {
        // Gather all routes
        $routes = $this->collectRoutes();

        // Create dispatcher
        $dispatcher = simpleDispatcher(function (RouteCollector $r) use ($routes) {
            foreach ($routes as $route) {
                $r->addRoute($route['method'], $route['path'], $route['handler']);
            }
        });

        // Fetch method and URI
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        // Strip query string (?foo=bar) if any
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        // Dispatch
        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {
            case \FastRoute\Dispatcher::NOT_FOUND:
                header("HTTP/1.0 404 Not Found");
                echo "404 Not Found";
                break;
            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                header("HTTP/1.0 405 Method Not Allowed");
                echo "405 Method Not Allowed. Allowed: " . implode(', ', $allowedMethods);
                break;
            case \FastRoute\Dispatcher::FOUND:
                $handler = $routeInfo[1];  // e.g. [LoginController::class, 'login']
                $vars = $routeInfo[2];     // e.g. ['id' => 123]
                $this->invokeHandler($handler, $vars);
                break;
        }
    }
    private function collectRoutes(): array
    {
        $routes = [];
    
        // 1) Load any global routes in app/routes.php
        $globalRoutesFile = __DIR__ . '/../routes.php';
        // adjust the relative path depending on your structure
        if (file_exists($globalRoutesFile)) {
            $globalRoutes = require $globalRoutesFile;
            if (is_array($globalRoutes)) {
                $routes = array_merge($routes, $globalRoutes);
            }
        }
    
        // 2) Loop through each module directory
        foreach (scandir($this->modulesDir) as $module) {
            if ($module === '.' || $module === '..') {
                continue;
            }
            $path = $this->modulesDir . '/' . $module;
            $routesFile = $path . '/routes.php';
    
            if (is_dir($path) && file_exists($routesFile)) {
                $moduleRoutes = require $routesFile;
                if (is_array($moduleRoutes)) {
                    $routes = array_merge($routes, $moduleRoutes);
                }
            }
        }
    
        return $routes;
    }
    

    private function invokeHandler(array $handler, array $vars): void
    {
        [$controllerClass, $method] = $handler;

        // Simple example: instantiate the controller and call the method
        $controller = new $controllerClass();
        call_user_func_array([$controller, $method], $vars);
    }
}