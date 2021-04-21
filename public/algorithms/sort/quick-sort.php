<?php
function quickSort(&$arr, $low, $high)
{
    $i = $low;
    $j = $high;
    $middle = $arr[($low + $high) / 2];   // middle – опорный элемент; в нашей реализации он находится посередине между low и high
    do {
        while ($arr[$i] < $middle) {
            ++$i;
        }  // Ищем элементы для правой части
        while ($arr[$j] > $middle) {
            --$j;
        }   // Ищем элементы для левой части
        if ($i <= $j) {
// Перебрасываем элементы
            $temp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $temp;
// Следующая итерация
            $i++;
            $j--;
        }
    } while ($i < $j);

    if ($low < $j) {
// Рекурсивно вызываем сортировку для левой части
        quickSort($arr, $low, $j);
    }

    if ($i < $high) {
// Рекурсивно вызываем сортировку для правой части
        quickSort($arr, $i, $high);
    }
}


$testArr = [1,4,7,94,54,65,24,2345,56,7567,456,8567,32,4,25,56,58];

quickSort($testArr, 0, count($testArr)-1);

