<?php

// 1. Разработайте класс Task, выполняющий ответственность обычной задачи Todo-списка. 
// Класс должен содержать приватные свойства description, dateCreated, dateUpdated, 
// dateDone, priority (int), isDone (bool) и обязательное user (User). В качества класса 
// пользователя воспользуйтесь разработанным на уроке. Класс Task должен содержать все 
// необходимые для взаимодействия со свойствами методы (getters, setters). При вызове 
// метода setDescription обновляйте значение свойства dateUpdated. Разработайте метод 
// markAsDone, помечающий задачу выполненной, а также обновляющий свойства dateUpdated и dateDone.

require_once 'classes/User.php';
require_once 'classes/Task.php';


$task = new Task(new User('Mikle', 'post@male.pu'));
$task->setDescription('Помыть машину');
$task->setPriority(2);
$result = $task->user->getUsername() . "\n";
$result .= $task->getDescription() . "\nприоритет задания - " . $task->getPriority();
$result .= "\nвремя создания задания - " . $task->getdateCreated()->format("H часов i минут s секунд\n");
echo("$result");

$task->markAsDone();
$status = "статус задачи - " . ($task->getIsDone() ? 'выполнена' : 'не выполнена');
echo($status);