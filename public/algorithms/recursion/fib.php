<?php

$amount = 1000;

function fib($n){
    if ($n == 0) return 0;
    if ($n == 1) return 1;
    return fib($n - 1) + fib($n - 2);
}


function fibonacci($n){
    $f = [];
    $f[0] = 0;
    $f[1] = 1;

    for ($i = 2; $i <= $n; $i++)
        $f[$i] = $f[$i - 1] + $f[$i - 2];

    return $f[$n];
}

$fibArray = [0,1];

function fiboRec(int $n) {
    global $fibArray;
    if (isset($fibArray[$n])) return $fibArray[$n];

    if ($n == 0) return 0;
    if ($n == 1) return 1;

    $fibArray[$n] = fiboRec($n - 1) + fiboRec($n - 2);
    return $fibArray[$n];
}

function fiboRecCorrect(int $n, $n1=1, $n2=0) {
    if ($n == 0) return 0;
    if ($n == 1) return 1;

    if ($n == 2) {
        return $n1 + $n2;
    }

    return fiboRecCorrect(--$n, $n1 + $n2, $n1);
}

function fibo2(int $n) {
    if ($n == 2) return [0,1,1];

    $res = fibo2(--$n);
    array_push($res, end($res) + prev($res));
    return $res;
}


//echo "Basic recursion\n";
//$start = microtime(true);
//
//echo fib($amount);
//
//$time = microtime(true) - $start;
//echo "\nduration: $time\n\n";


echo "Basic cycle\n";
$start = microtime(true);

echo fibonacci($amount);

$time = microtime(true) - $start;
echo "\nduration: $time\n\n";


echo "Cached recursion\n";
$start = microtime(true);

echo fibo2($amount)[$amount];

$time = microtime(true) - $start;
echo "\nduration: $time\n\n";

echo "Correct recursion\n";
$start = microtime(true);

echo fiboRecCorrect($amount);

$time = microtime(true) - $start;
echo "\nduration: $time\n\n";
