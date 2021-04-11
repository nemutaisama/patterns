<?php

function algorithm(array $values, int $value)
{
    for ($i = 0; $i < count($values); $i++) {
        if ($values[$i] == $value) {
            return $values[$i];
        }
    }
}


$values = [1,2,3,4,5,6,7,8,9,10];
$x = 1;

algorithm($values, $x);
