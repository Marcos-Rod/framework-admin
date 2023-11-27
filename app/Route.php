<?php

namespace App;

class Route
{
    private static $routes = [];
    private static $middleware = [];

    public static function get($uri, $callback)
    {
        $uri = trim($uri, '/');
        self::$routes['GET'][$uri] = $callback;
    }

    public static function post($uri, $callback)
    {
        $uri = trim($uri, '/');
        self::$routes['POST'][$uri] = $callback;
    }

    public static function middleware($middleware)
    {
        self::$middleware[] = $middleware;
        return new self(); // Devuelve una nueva instancia de Route
    }

    public static function dispatch()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = trim($uri, '/');

        if (strpos($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }

        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes[$method] as $route => $callback) {

            if (strpos($route, ':') !== false) {
                $route = preg_replace('#:[a-zA-Z0-9\-\=]+#', '([a-zA-Z0-9\-\=]+)', $route);
            }

            if (preg_match("#^$route$#", $uri, $matches)) {
                $params = array_slice($matches, 1);

                self::handleMiddleware(); // Manejo de middleware antes de la ejecución de la ruta

                if (is_callable($callback)) {
                    $response = $callback(...$params);
                }

                if (is_array($callback)) {
                    $controller = new $callback[0];
                    $response = $controller->{$callback[1]}(...$params);
                }


                if (is_array(($response)) || is_object($response)) {
                    header('Content-Type: application/json');
                    echo json_encode($response);
                } else {
                    echo $response;
                }

                return;
            }
        }

        include  URL_SERVIDOR . "404.php";
    }

    private static function handleMiddleware()
    {
        foreach (self::$middleware as $middleware) {
            // Verifica si ya contiene el espacio de nombres
            if (!str_starts_with($middleware, 'App\Middleware\\')) {
                $middleware = 'App\Middleware\\' . $middleware;
            }

            $middlewareInstance = new $middleware();
            $middlewareInstance->handle();
        }
    }
}
