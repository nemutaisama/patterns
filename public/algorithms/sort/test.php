<?php
$count = 0;
$count2 = 0;
$count3 = 0;

function isPrime(int $n): bool {
    global $count;
    for ($i = floor(sqrt($n)); $i > 1; $i--){
        $count++;
        if ($n % $i === 0) return false;
    }
    return true;
}

$n = 600851475143;

function getMaxPrimeDivisor($n)
{
    global $count;
    for ($i = floor(sqrt($n)); $i > 1; $i--) {
        $count++;
        if ($n % $i === 0 && isPrime($i)) {
            return $i;
        }
    }

    return 1;
}

function getMaxPrimeDivisor2($n): int
{
    global $count2;
    $i = floor(sqrt($n));
    while ($i > 1) {
        $count2++;
        if ($n % $i === 0) {
            if (isPrime($i)) {
                return $i;
            } else {
                $n1 = $n / $i;
                $n2 = $i;
                break;
            }
        } else {
            $i--;
        }
    }
    $i = 2;
    while ($i < $n1) {
        $count2++;
        if ($n1 % $i === 0) {
            $n1 = $n1 / $i;
            if (isPrime($n1)) {
                $max1 = $n1;
            }
        } else {
            $i++;
        }
    }
    $i = 2;
    while ($i < $n2) {
        $count2++;
        if ($n2 % $i === 0) {
            $n2 = $n2 / $i;
            if (isPrime($n2)) {
                $max2 = $n2;
            }
        } else {
            $i++;
        }
    }
    return max($max1, $max2, 1);
}


function getMaxPrimeDivisor3($n): int
{
    if (isPrime($n)) {
        return $n;
    }
    global $count3;
    $i = floor(sqrt($n));
    while ($i > 1) {
        $count3++;
        if ($n % $i === 0) {
            return max(
                getMaxPrimeDivisor3($i),
                getMaxPrimeDivisor3($n / $i),
            );
        } else {
            $i--;
        }
    }
    return 1;
}

$start = microtime(true);
$result = getMaxPrimeDivisor($n);
$time = microtime(true) - $start;
echo "Результат: $result Время выполнения: $time Число итераций: $count\n";

$start = microtime(true);
$result = getMaxPrimeDivisor2($n);
$time = microtime(true) - $start;
echo "Результат: $result Время выполнения: $time Число итераций: $count2\n";

$start = microtime(true);
$result = getMaxPrimeDivisor3($n);
$time = microtime(true) - $start;
echo "Результат: $result Время выполнения: $time Число итераций: $count3\n";
