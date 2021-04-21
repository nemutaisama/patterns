<?php
function LinearSearch ($myArray, $num) {
    $count = count($myArray);

    for ($i=0; $i < $count; $i++) {
        if ($myArray[$i] == $num) return $i;
        elseif ($myArray[$i] > $num) return null;
    }
    return null;
}


$start = microtime(true);
$arr = [];
for ($i = 0; $i <= 1000000; $i++) {
    $arr[] = rand(0,10000000);
}
$val = rand(0,10000000);
$res = LinearSearch($arr, $val);
$time = microtime(true) - $start;
echo "found $val at position {$res} in {$time}";
