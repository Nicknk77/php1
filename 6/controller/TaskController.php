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
        setcookie('list', TaskProvider::addTask($_POST['oneMore'], $_COOKIE['list']));
        $list = TaskProvider::addTask($_POST['oneMore'], $_COOKIE['list']);
    }

    if (!is_null($list)) {
        $list = (count(explode(',', $list)) > 1 ? 
        explode(',', $list) : 
        str_split($list, strlen($list))
        );
    }
    if (isset($_GET['todo'])) { 
        unset($list[$_GET['todo']]);
        setcookie('list',implode(',', $list));
        header('Location:?controller=todo');
    }

    $tasks = TaskProvider::getUndoneList($list);
    
    require_once 'view/todo.php';
    
}