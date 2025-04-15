<?php

namespace App\Components\lists;

use App\Entities\Task;

class TaskList {

    public static function render(array $tasks): string {
        $html = '<h1>Lista de Tarefas</h1>

        <ul class="task-list">';
        foreach ($tasks as $task) {
            if ($task instanceof Task) {
                $html .= '<li class="task-item">
                    <span class="task-text">' . htmlspecialchars($task->getText()) . '</span>
                    <form class="task-actions" method="POST" action="task/updateStatus" style="display: inline-block;">
                        <input type="hidden" name="taskIndex" value="' . $task->getIndex() . '">
                        <select name="status" class="status-select">
                            <option value="Pendente"' . ($task->getStatus() === 'Pendente' ? ' selected' : '') . '>Pendente</option>
                            <option value="Em Andamento"' . ($task->getStatus() === 'Em Andamento' ? ' selected' : '') . '>Em Andamento</option>
                            <option value="Concluída"' . ($task->getStatus() === 'Concluída' ? ' selected' : '') . '>Concluída</option>
                        </select>
                        <button type="submit" class="btn-update">Atualizar</button>
                    </form>
                    <form class="delete-form" method="POST" action="task/delete" style="display: inline-block;">
                        <input type="hidden" name="taskIndex" value="' . $task->getIndex() . '">
                        <button type="submit" class="btn-delete">Remover</button>
                    </form>
                </li>';
            }
        }
        $html .= '</ul>';
        return $html;
    }
}