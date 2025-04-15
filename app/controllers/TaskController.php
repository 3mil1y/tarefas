<?php

namespace App\Controllers;

use App\core\Controller;
use App\core\Flash;
use App\models\TaskModel;
use App\entities\Task;

class TaskController extends Controller {
    public function home() {
        $title = 'Lista de Tarefas';
        $tasks = TaskModel::getAll();
        $this->view('home', compact('title','tasks'));
    }
    
    public function add() {
        if ($this->isPost()) {
            $taskText = trim($this->input('task'));
            if (empty($taskText)) {
                Flash::set('O texto da tarefa não pode estar vazio', 'error');
                $this->redirect('task/add');
                return;
            }

            $status = $this->input('status') ?? 'Pendente';
            TaskModel::addTask(new Task($taskText, $status));
            Flash::set('Tarefa adicionada com sucesso!', 'success');
            $this->redirect('home');
            return;
        }

        $title = 'Adicionar Tarefa';
        $action = 'task/add';
        $this->view('addTask', compact('title', 'action'));
    }

    public function updateStatus() {
        if ($this->isPost()) {
            $taskIndex = (int)$this->input('taskIndex');
            $status = $this->input('status');
            
            if (empty($status)) {
                Flash::set('Status inválido', 'error');
                $this->redirect('home');
                return;
            }

            if (TaskModel::updateTaskStatus(new Task('', $status, $taskIndex))) {
                Flash::set('Status atualizado com sucesso!', 'success');
            } else {
                Flash::set('Erro ao atualizar status. Tarefa não encontrada.', 'error');
            }
        }
        $this->redirect('home');
    }

    public function delete() {
        if ($this->isPost()) {
            $taskIndex = $this->input('taskIndex');
            $task = new Task('', 'Pendente', $taskIndex);
            
            if (TaskModel::deleteTask($task)) {
                Flash::set('Tarefa excluída com sucesso!', 'success');
            } else {
                Flash::set('Erro ao excluir tarefa. Tarefa não encontrada.', 'error');
            }
        }
        $this->redirect('home');
    }

    public function reboot(){
        TaskModel::clearSession();// Clear session data
        TaskModel::initialize(); // Reinitialize tasks
        Flash::set('Sistema reiniciado com sucesso!', 'success');
        $this->redirect('home');
    }
}