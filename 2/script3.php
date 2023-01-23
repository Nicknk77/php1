<?php
// 3. Представьте, что вы ведёте счёт на пальцах одной ладони, не считая два раза подряд один и тот же, начиная 
// с большого. Дойдя до мизинца, вы продолжаете счёт в обратном направлении. Напишите скрипт для запуска из 
// командной строки, определяющий по введённому положительному числу палец, который соответствует ему по счёту. 
// В случаях, если введено некорректное значение (меньше или равное нуля) повторяйте запрос ввода, пока не 
// будет введено корректное число.

$fingers = ['большой', 'указательный', 'средний', 'безымянный', 'мизинец'];

do {
    $num = (int)readline("введите число, я скажу, какой палец ему соответствует:" . PHP_EOL);
}
while ($num < 1);
for ($i = 0, $j = 0, $flag = true; $i < $num; $i++) {
    if ($j < count($fingers) && $j >= 0 && $flag == true) {
        $j++;
        $finger = $fingers[$j-1];
    }else {
        $flag = false;
        $j--;
        $finger = $fingers[$j-1];
        if ($j == 1) $flag = true;
    }
 }

echo $finger;

?>