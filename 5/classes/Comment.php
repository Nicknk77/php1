<?php

class Comment {
    private User $author;
    private Task $task;
    private string $text;

    public function __construct(Task $task, string $text) {
        $this->author = $task->user;
        $this->task = $task;
        $this->text = $text;
        return $this;
    }
    
    public function getAuthor() {
        return $this->author;
    }

    public function getTask() {
        return $this->task;
    }

    public function setTask($task) {
        $this->task = $task;
        return $this;
    }

    public function getText() {
        return $this->text;
    }

    public function setText($text) {
        $this->text = $text;
        return $this;
    }

}