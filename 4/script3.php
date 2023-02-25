<?php
// 3. *Дан многомерный массив, представляющий собой коробку, в которую сложены предметы.
// Помимо обычных предметов, каждая коробка может содержать другие коробки. Необходимо
// написать функцию, проверяющую, есть ли предмет в цепочке коробок или нет.
// Функция должна принимать два аргумента: стоковое название предмета для поиска
// (например: «Ключ») и изначальный массив. Возвращаемое значение — bool, где true означает
// наличие предмета, а false его отсутствие. Механизм поиска должен быть реализован с
// применением рекурсии. Пример массива:
$box = [
    [
    0 => 'Тетрадь',
    1 => 'Книга',
    2 => 'Настольная игра',
    3 => [
        'Настольная игра',
        'Напольная игра',
        ],
    4 => [
            [
            'Ноутбук',
            'Зарядное устройство'
            ],
            [
            'Компьютерная мышь',
            'Набор проводов',
            [
            'Фотография',
            'Картина'
            ]
            ],
            [
            'Инструкция',
            [
            'Ключ'
            ]
            ]
        ]
    ],
    [
        0 => 'Пакет кошачьего корма',
        1 => [
            'Музыкальный плеер',
            'Книга'
            ]
    ]
];

function findItem(string $item, array $container) : bool {
    foreach($container as $piece) {
        if (is_array($piece)) {
            $res = findItem($item, $piece);
            if ($res) return $res;
        }elseif ($piece == $item) {
            $res = true;
            return $res;
        }
    }
    return false;
}

$name = 'Зарядное устройство';

echo(findItem($name, $box)) ? "\"$name\" есть в этой коробке" : "\"$name\" нет в этой коробке";