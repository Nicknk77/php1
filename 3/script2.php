<?php

// 2.Разработайте скрипт для запуска из командной строки, генерирующий персонализированные 
// поздравления с днём рождения. Подготовьте два массива: в первом храните пожелания
// (счастья, здоровья и т.д.), во втором эпитеты (бесконечного, крепкого и т.д.). При запуске
// запросите имя именинника и после ввода сгенерируйте текст поздравления, включающий три
// пожелания. Комбинации эпитетов и пожеланий должны быть случайными. В результате
// необходимо получить строку, по следующему примеру: «Дорогой Илон Маск, от всего сердца
// поздравляю тебя с днем рождения, желаю космического терпения, бесконечного здоровья и
// безудержного воображения!». Для реализации используйте функции array_rand и implode;


$wishes = ['счастья', 'здоровья', 'достатка', 'терпения', 'воображения'];
$epithet = ['бесконечного', 'крепкого', 'большого', 'хорошего', 'завидного'];

$name = (readline("Как вас зовут, именинник? \n"));

while(count($epithet)) {
    $key = array_rand($epithet);
    $epithet_random[] = $epithet[$key];
    unset($epithet[$key]);
}

while(count($wishes)) {
    $key = array_rand($wishes);
    $wishes_random[] = $wishes[$key];
    unset($wishes[$key]);
}

if (count($wishes_random) >= count($epithet_random)) {
    $i = 0;
    while(count($epithet_random)) {
        $phrase[] = implode(' ', [$epithet_random[$i], $wishes_random[$i]]);
        unset($epithet_random[$i]);
        unset($wishes_random[$i]);
        $i++;
    } 
} else {
    $i = 0;
    while(count($wishes_random)) {
        $phrase[] = implode(' ', [$epithet_random[$i], $wishes_random[$i]]);
        unset($epithet_random[$i]);
        unset($wishes_random[$i]);
        $i++;
    } 
}

$result = "Дорогой $name, от всего сердца поздравляю тебя с днем рождения, 
желаю $phrase[0], $phrase[1] и $phrase[2]!";

echo $result;