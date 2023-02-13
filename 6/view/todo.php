<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    <style type="text/css">
        header {
            display: flex;
            align-items: center;
        }
        h3 {
            margin-right: 50px;
        }
        a.logout {
            text-decoration: none;
            font-size: 2rem;
            border: 1px solid #333;
            padding:0 5px 7px;
        }
        a {
            margin-left: 30px;
            border: 1px solid #333;
            text-decoration: none;
        }
        a:hover {
            background-color: #ddd;
        }

    </style>

</head>
<body>
    <header>
    <h3>
        <?=$name?>, здесь список ваших дел.
    </h3>
    <div>
        <a class="logout" href="?controller=security&action=logout">выход</a>
    </div>
    </header>
    <div>
        <?php if (isset($tasks) && count($tasks) > 0) { ?>
        <ul>
            <?php foreach ($tasks as $index=>$task) : ?>
            <li><?php echo $task->getDescription(); ?>
            <a href="?controller=todo&todo=<?=$index?>">v</a></li>
            <?php endforeach; ?>
        </ul>
        <?php } ?>
    </div>
    <div>
        <form method="post">
            <input type="text" placeholder="enter ToDo" name="oneMore">
            <input type="submit" value="Добавить">
        </form>
    </div>
</body>
</html>