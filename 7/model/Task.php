<?php

require_once 'User.php';

class Task {
    private string $description;
    private bool $isDone;
    
    public function __construct(string $task) {
        $this->description = $task;
        $this->isDone = false;
    }

    public function getDescription(): string { 
        return $this->description;
    }

    public function setDescription(string $description) {
        $this->description = $description;
    }

    public function markAsDone(): Task {
        $this->isDone = true;
        return $this;
    }

    public function getIsDone(): bool {
        return $this->isDone;
    }

}