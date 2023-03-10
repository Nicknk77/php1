<?php
// 2. Разработайте функцию с объявленными типами аргументов и возвращаемого значения,
// принимающую в качестве аргумента массив целых чисел. Результатом работы функции
// должен быть массив, содержащий три элемента: max — наибольшее число, min —
// наименьшее число, avg — среднее арифметическое всех чисел массива;

$arr = [4, 5, 1, 4, 7, 8, 15, 6, 71, 45, 2];

function checkArray(array $ar): array {
    $max = max($ar);
    $min = min($ar);
    $avg = round(array_sum($ar) / count($ar), 2);
    $res = ['Max' => $max, 'Min' => $min, 'Avg' => $avg];
    return $res;
}

print_r(checkArray($arr));