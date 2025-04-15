<?php

namespace App\Components\Form;

class CreateTask{
    public static function render($action): string {
        return '
        <div class="form-container">
            <h2>Nova Tarefa</h2>
            <form method="POST" action="' . $action . '">
                <div class="form-group">
                    <input type="text" name="task" placeholder="Digite a tarefa" required>
                </div>
                <div class="form-group">
                    <select name="status">
                        <option value="Pendente">Pendente</option>
                        <option value="Em Andamento">Em Andamento</option>
                        <option value="Concluída">Concluída</option>
                    </select>
                </div>
                <button type="submit" class="btn-submit">Adicionar Tarefa</button>
            </form>
        </div>';
    }
}