<?php

require_once 'model/UserProvider.php';
$pdo = require 'db.php'; 

$error = null;
if (isset($_POST['username'], $_POST['name'], $_POST['password'])) {
    ['username' => $username, 'name' => $name, 'password' => $password] = $_POST;

    $userProvider = new UserProvider($pdo); 
    
    if ($userProvider->getByUsername($username)) {
        $error = 'Пользователь с таким именем уже есть';
    } else {
        $user = new User($username);
        $user->setName($name);
        $userProvider->registerUser($user, $password);
        $_SESSION['user'] = $user;
    }

    
}

if (isset($_SESSION['user'])) {
    setcookie('userIn', $_SESSION['user']->getUsername());
    header('Location:?controller=todo');
}

require_once 'view/registr.php';