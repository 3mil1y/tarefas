<?php

/**
 * Autoloader for the application
 * This script automatically loads classes from the specified directories.
 * It uses the PSR-4 autoloading standard.
 */

spl_autoload_register(function ($className) {

    // Check if the class already exists
    if (class_exists($className, false)) {
        return;
    }

    // Convert namespace separators to directory separators
    $className = str_replace('App\\', '', $className);
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    
    // Build the path
    $filePath = __DIR__ . "/../{$className}.php";

    // Include the file if it exists, if not throw an exception
    if (file_exists($filePath)) {
        require_once $filePath;
    } else {
        throw new Exception("A classe: {$className} não foi encontrada em {$filePath}.");
    }
});