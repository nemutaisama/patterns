<?php

function tail(int $n) {
    if ($n == 0) {
        return;
    }

    else {
        echo $n . " ";
    }

    tail($n - 1);
}

function head($n) {
    if ($n == 0) {
        return;
    }

    else {
        head($n - 1);
    }

    echo $n . " ";
}


$arr = [1,2,3,4,5,6,6,6,7,8,9,10,11];

$i = 1;
foreach ( $arr as $ar ) {

    echo "шаг {$i} :  ";
    $i++;
    if ( ($key = array_search(6,$arr)) !== false ) {
        echo "нашли совпадение. ключ {$key}. удалили";
        unset($arr[$key]);
    } else {
        echo "ничего не нашли";
    }
    echo "\n";
}
