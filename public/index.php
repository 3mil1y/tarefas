<?php
require_once "../app/core/autoloader.php"; // Autoload das classes

use App\Core\Router;
use App\Models\TaskModel;
use App\core\Session;

Session::start(); // Inicia a sessão
Session::set('tasks', TaskModel::getAll()); // Carrega as tarefas na sessão

Router::run();
?>