<?php

require_once 'Task.php'; 

class TaskProvider {    

    // Метод для получения списка невыполненных задач
    public static function getUndoneList() :?array {
        $pdo = require_once 'db.php';

        $statement = $pdo->query('SELECT `id`, `description` FROM `tasks`');
        while ($task = $statement->fetch()) $tasks[$task['id']] = $task['description'];
        if (!isset($tasks) OR is_null($tasks)) return [];
        $list = [];
        foreach ($tasks as $key => $task) {
            $list[$key] = new Task($task) ?? [];
        }
        
        return $list;
    }

    // Метод для добавления задачи
    public static function addTask(string $task) :bool {
        $pdo = require_once 'db.php';

        $statement = $pdo->prepare('INSERT INTO `tasks` (`description`, `isDone`) VALUES (?, 0)');
        $res = $statement->execute([$task]);
        
        return $res;
    }

    // Метод удаления/выполнения задачи
    public static function delTask($id) :bool {
        $pdo = require_once 'db.php';

        $res = $pdo->exec("DELETE FROM `tasks` WHERE `id` = '$id'");//DELETE FROM `tasks` WHERE `id` = '$id'

        return $res;
    }

}
