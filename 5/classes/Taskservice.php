<?php

class TaskService {

    private array $comments = [];
    private static User $author;
    private static Task $task;
    private static string $text;

    public static function addComment(Task $task, string $text): Comment {
        $author = $task->user->getUsername();
        return new Comment($task, $text);
    }

}