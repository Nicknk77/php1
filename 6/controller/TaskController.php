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
        setcookie('list', TaskProvider::addTask($_POST['oneMore'], $list));
        header('Location:?controller=todo');
    }

    if (!is_null($list)) $list = explode(',', $_COOKIE['list']);
    
    $_SESSION['list'] = TaskProvider::getUndoneList($list);
    
    require_once 'view/todo.php';
    
}