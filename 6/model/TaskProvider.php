<?php
// Разработайте страницу работы с задачами TODO-списка, доступную только авторизованным 
// пользователям. Подготовьте отдельный файл представления (view), контроллер (TaskController) 
// и два класса модели: TaskProvider и сущность Task. В сущности Task реализуйте свойства 
// isDone (bool) и description (string). В TaskProvider разработайте два метода: 
// getUndoneList – для получения списка невыполненных задач и addTask для добавления. 
// Сохраняйте задачи в сессию авторизованного пользователя. В файле представления выведите 
// список текущих задач с кнопкой выполнения (используйте тег <a> с передачей GET-параметров), 
// а также подготовьте форму для их добавления.
require_once 'Task.php'; 

class TaskProvider {
    

    // Метод для получения списка невыполненных задач
    public static function getUndoneList(?array $tasks) :?array {
        if (is_null($tasks)) return [];
        $list = [];
        foreach ($tasks as $task) {
            $list[] = new Task($task) ?? [];
        }
        return $list;
    }

    // Метод для добавления задачи
    public static function addTask(string $task, ?string $tasks) : string {
        $tasks = $tasks ? ($tasks . "," . $task) : $task;
        return $tasks;
    }
}
