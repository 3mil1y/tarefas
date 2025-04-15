<?php

namespace App\Components\Layout;

class Header {
    public static function render(): string {
        return '<header class="main-header">
            <nav>
                <h1>Gerenciador de Tarefas</h1>
                <ul class="nav-menu">
                    <li><a href="task/home">Home</a></li>
                    <li><a href="task/add">Nova Tarefa</a></li>
                    <li><a href="task/reboot">Reiniciar Tarefas</a></li>
                </ul>
            </nav>
        </header>
        <main class="container">';
    }
}