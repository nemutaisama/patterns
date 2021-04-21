<?php

function factorial($n) {
    if ($n <= 1) {
        return 1;
    }

    return $n * factorial($n - 1);
}

function plainFactorial($n) {
    $res = 1;
    while ($n > 1) {
        $res = $res * $n;
        $n--;
    }
    return $res;
}

$test = 3;

$start = microtime(true);
$res1 = factorial($test);
$time1 = microtime(true) - $start;

$start = microtime(true);
$res2 = plainFactorial($test);
$time2 = microtime(true) - $start;

echo "\nrec: {$res1}\n\tin {$time1}\ncycle: {$res2}\n\tin {$time2}\n";
