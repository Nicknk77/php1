<?php

require_once 'model/UserProvider.php';

$error = null;

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    setcookie('userIn', null, -1);
    unset($_COOKIE['userIn']);
    setcookie('list', null, -1);
    unset($_COOKIE['list']);
    unset($_SESSION['list']);

    if (isset($_SESSION['user'])) unset($_SESSION['user']);
    header('Location: /');
}

if (isset($_POST['username'], $_POST['password'])) {
    ['username' => $username, 'password' => $password] = $_POST;
    $userProvider = new UserProvider();
    $user = $userProvider->getByUsernameAndPassword($username, $password);
    if ($user === null) {
        $error = 'Пользователь с указанными учетными данными не найден';
    } else {
            $_SESSION['user'] = $user;
        }
}
if (isset($_SESSION['user'])) {
    setcookie('userIn', $_SESSION['user']->getUsername());
    header('Location:?controller=todo');
}



require_once 'view/signin.php';