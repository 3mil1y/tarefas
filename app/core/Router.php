<?php
namespace App\Core;

/**
 * Router class
 * This class is responsible for routing requests to the appropriate controller and method.
 * It also handles middleware registration and execution.
 */

class Router {
    private static $middlewares = [];

    public static function addMiddleware($middleware) {
        self::$middlewares[] = $middleware;
    }

    public static function run() {
        // Get URL entered by user
        $url = isset($_GET['url']) ? explode("/", filter_var(rtrim($_GET['url'], "/"), FILTER_SANITIZE_URL)) : [];

        // Define default controller and method
        $controllerName = isset($url[0]) && $url[0] != "" ? ucfirst($url[0]) . "Controller" : "TaskController";
        $methodName = isset($url[1]) ? $url[1] : "home";
        $params = array_slice($url, 2); // Get extra URL parameters

        // Controller path
        $controllerPath = "../app/controllers/" . $controllerName . ".php";

        // Check if controller exists
        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            $controllerClass = "App\\Controllers\\" . $controllerName;
            $controller = new $controllerClass();

            // Check if method exists in controller
            if (method_exists($controller, $methodName)) {
                call_user_func_array([$controller, $methodName], $params);
            } else {
                throw new \Exception("Method '{$methodName}' not found in controller.");
            }
        } else {
            throw new \Exception("Controller not found: {$controllerPath}");
        }
    }
}