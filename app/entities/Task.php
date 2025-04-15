<?php

namespace App\Entities;

class Task {
    private int $index;
    private string $text;
    private string $status;

    public function __construct(string $text, string $status = 'Pendente', int $index = 0) {
        $this->index = $index;
        $this->text = $text;
        $this->status = $status;
    }

    public function getIndex(): int {
        return $this->index;
    }

    public function setIndex(int $index): void {
        $this->index = $index;
    }

    public function getText(): string {
        return $this->text;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function setStatus(string $status): void {
        $this->status = $status;
    }
}