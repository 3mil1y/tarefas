<?php

namespace App\core;

/**
 * Base Controller class
 * This class serves as a base for all controllers in the application.
 * It provides methods for rendering views, redirecting, and handling input.
 */

abstract class Controller {
    protected function view(string $view, array $dados = []) {
        extract($dados); // Turn array keys into variables

        // Include the view file, if not, throw an exception
        if (!file_exists("../app/views/$view.php")) {
            throw new \Exception("View file not found: $view.php");
        }
        require_once "../app/views/$view.php";
    }

    protected function redirect(string $url) {
        // Redirect the page
        header("Location: $url");
        exit;
    }

    protected function input(string $key, $default = null) {
        return $_POST[$key] ?? $_GET[$key] ?? $default;
    }

    protected function isPost(): bool {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
    
    protected function isGet(): bool {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }
}