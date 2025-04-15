<?php

namespace App\models;

use App\core\BaseModel;
use App\entities\Task;
use App\core\Session;

class TaskModel extends BaseModel {
    private static array $tasks = [];

    public static function initialize() {
        self::$tasks = Session::get('tasks') ?? [
            new Task('Acesse a página!', 'Concluída'),
            new Task('Crie a sua primeira tarefa!', 'Pendente'),
            new Task('Conheça o site!', 'Pendente')
        ];
        // Garantir que os índices estão corretos na inicialização
        foreach (self::$tasks as $index => $task) {
            $task->setIndex($index);
        }
        self::saveInSession(); // Save to session
    }

    public static function getAll(): array {
        if (empty(self::$tasks)) {
            self::initialize();
        }
        return self::$tasks;
    }

    public static function addTask(Task $task): array {
        $newIndex = count(self::$tasks);
        $task->setIndex($newIndex);
        self::$tasks[] = $task;
        self::saveInSession();
        return self::$tasks;
    }

    public static function updateTaskStatus(Task $task): bool {
        if (isset(self::$tasks[$task->getIndex()])) {
            self::$tasks[$task->getIndex()]->setStatus($task->getStatus());
            self::saveInSession(); // Save to session
            return true;
        }
        return false;
    }

    public static function deleteTask(Task $task): bool {
        if (isset(self::$tasks[$task->getIndex()])) {
            unset(self::$tasks[$task->getIndex()]);
            // Reindexar o array e atualizar os índices de cada tarefa
            self::$tasks = array_values(self::$tasks);
            foreach (self::$tasks as $index => $task) {
                $task->setIndex($index);
            }
            self::saveInSession();
            return true;
        }
        return false;
    }

    public static function saveInSession(): void {
        Session::set('tasks', self::$tasks); // Save to session
    }

    public static function loadFromSession(): void {
        self::$tasks = Session::get('tasks') ?? [];
        // Garantir que os índices estão corretos ao carregar da sessão
        foreach (self::$tasks as $index => $task) {
            $task->setIndex($index);
        }
    }

    public static function clearSession(): void {
        Session::remove('tasks'); // Clear session
        self::$tasks = []; // Clear local tasks array
    }
}