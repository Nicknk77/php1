<?php

// 1. Доработайте скрипт инициализации базы данных fixture.php, добавив в него выполнение 
// запроса на создание таблицы tasks, содержащей поля: id (int), 
// description (varchar), isDone (tinyint);


/* @var $pdo PDO */
$pdo = require_once 'db.php';
require_once 'model/UserProvider.php';

$pdo->exec('DROP TABLE IF EXISTS users');

$pdo->exec('CREATE TABLE users (
id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
name VARCHAR(150),
username VARCHAR(100) NOT NULL,
password VARCHAR(100) NOT NULL
)');

$pdo->exec('CREATE TABLE tasks (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    description VARCHAR(200) NOT NULL,
    isDone TINYINT NOT NULL
    )
');


$user = new User('geekbrains');
$user->setName('GeekBrains PHP');
$userProvider = new UserProvider($pdo);
$userProvider->registerUser($user, 'password123');
