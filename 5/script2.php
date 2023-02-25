<?php

// 2. Реализуйте два класса: Comment и TaskService. Comment должен содержать свойства 
// author (User), task (Task) и text (string). TaskService должен реализовывать статичный 
// метод addComment(User, Task, text), добавляющий к задаче комментарий пользователя. 
// Отношение между классами задачи и комментария должны быть построены по типу ассоциация, 
// поэтому необходимо добавить соответствующее свойство и методы классу Task.

require_once 'classes/User.php';
require_once 'classes/Task.php';
require_once 'classes/Comment.php';
require_once 'classes/Taskservice.php';

$user1 = new User('Mikle', 'post@male.pu');
$task = new Task($user1, 'Помыть машину');
$task->setPriority(2);

$comments = [];
$comments[] = TaskService::addComment($task, 'comment number one');
$comments[] = TaskService::addComment($task, 'comment number two');

$result = $comments[0]->getAuthor()->getUsername();
$result .= ": \nпервый комментарий - " .$comments[0]->getText();
$result .= "\nвторой комментарий - " .$comments[1]->getText();

// print_r($comments);
echo($result);