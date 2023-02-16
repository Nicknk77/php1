<?php

$pdo = require_once 'db.php';

// $statement = $pdo->prepare('INSERT INTO `tasks` (`description`, `isDone`) VALUES (?, 0)');
// $res = $statement->execute(['second evening']);

// $statement = $pdo->query('SELECT * FROM `tasks`');
// $res = $statement->fetch();

// $res = $pdo->exec('DELETE FROM `tasks`');
// $res = $statement->execute();
$username = 'geekbrain';
$statement = $pdo->query("SELECT * FROM users");
while($res = $statement->fetch()) {
    echo $res["username"] . ":" . $res['password'] . "\n";
}


var_dump($res);