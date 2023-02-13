<html>
    <head>
        <meta charset="UTF-8">
        <title>Главная</title>
    </head>
    <body>
        <?php if (isset($_SESSION['user'])) : ?>
            <p>Вы в системе
            <a href = "?controller=security&action=logout">выйти</a>
            </p>
        <?php else : ?>
            <a href = "?controller=security">войти</a>
        <?php endif ?>
        <h1><?=$pageHeader?></h1>
        <?php if ($username !== null) : ?>
            <p>Рады вас приветствовать, <?=$username?></p>
            <a href="?action=logout">Выйти</a>
        <?php else : ?>
            <form method='post'>
                <input type="text" name="username" placeholder="Введите ваше имя" />
                <input type= "submit" value="Отправить" />
            </form>
        <?php endif ?>
    </body>
</html>