<?php
declare(strict_types=1);

namespace Core;

use function trim;
use function parse_url;

class Router
{
    private array $routes = [];

    /**
     * Register a route.
     * 
     * @param  string $method
     * @param  string $path
     * @param  string $controller
     * @param  string $action
     * @return void
     */
    public function addRoute(
        string $method,
        string $path,
        string $controller,
        string $action
    ): void {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'action' => $action,
        ];
    }

    /**
     * Dispatch the request to the controller and action.
     * 
     * @return void
     */
    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $path) {
                $controllerName = 'Controllers\\' . $route['controller'];
                $controller = new $controllerName();
                $controller->{$route['action']}();
                return;
            }
        }

        // Handle 404 if no route matches
        echo '404 Not Found';
    }
}