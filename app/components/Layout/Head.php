<?php

namespace Components\Layout;

class Head {
    public static function render(string $title = 'Lista de Tarefas'): string {
        return '<!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>' . $title . '</title>
            
            <base href="/tarefas/">

            <link rel="stylesheet" href="public/css/main.css">
            <script src="public/js/main.js"></script>
        </head>
        <body>';
    }
}