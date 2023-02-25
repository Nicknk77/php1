<?php 

require_once "model/TaskProvider.php";


$name = $_COOKIE['userIn'] ?? null;

if (isset($_SESSION['user']) &&  $name) {
    
    if (isset($_COOKIE['list']) && !empty($_COOKIE['list'])) {
        $list = $_COOKIE['list'];
    }else {
        $list = null;
        $_COOKIE['list'] = null;
    }

    if (isset($_POST['oneMore']) && !empty($_POST['oneMore'])) {
        TaskProvider::addTask($_POST['oneMore']);
        header('Location:?controller=todo');
    }

    if (isset($_GET['todo'])) { 
        TaskProvider::delTask($_GET['todo']);
        header('Location:?controller=todo');
    }

    $tasks = TaskProvider::getUndoneList();
    
    require_once 'view/todo.php';
    
}