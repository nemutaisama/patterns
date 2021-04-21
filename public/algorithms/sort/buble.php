<?php
function bubbleSort($array){
    $count = count($array);
    for ($i = 0; $i < $count; $i++) {
        for ($j = 0; $j < $count - $i - 1; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                $temp = $array[$j];
                $array[$j] = $array[$j+1];
                $array[$j+1] = $temp;
            }
        }
    }
    return $array;
}

function bubbleSort2($array){
    $count = count($array);
    for ($i = 0; $i < $count; $i++) {
        for ($j = 0; $j < $count - $i - 1; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                list($array[$j], $array[$j + 1]) = array($array[$j + 1], $array[$j]);
            }
        }
    }
    return $array;
}

$start = microtime(true);
$arr = [];
for ($i = 0; $i <= 10000; $i++) {
    $arr[] = rand(0,10000000);
}
$time = microtime(true) - $start;
echo "foreach fill in {$time}\n";
$start = microtime(true);
$arr = [];
for ($i = 0; $i <= 10000; $i++) {
    $arr[] = rand(0,10000000);
}
$time = microtime(true) - $start;
echo "array_fill in {$time}\n";
$start = microtime(true);
$res = bubbleSort($arr);
$time = microtime(true) - $start;
echo "Temp var sorted in {$time}\n";
$start = microtime(true);
$res = bubbleSort2($arr);
$time = microtime(true) - $start;
echo "List sorted in {$time}\n";
