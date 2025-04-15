<?php

namespace App\Core;

/**
 * BaseModel class
 * This class serves as a base for all models in the application.
 * It provides an abstract getAll method.
 * Other util methods can be added here as needed.
 */

abstract class BaseModel {
    abstract public static function getAll();
} 