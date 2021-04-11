<?php

$arr = [
    [
        ["sitepoint", "phpmaster"],
        ["buildmobile", "rubysource"]
    ],
    ["designfestival", "cloudspring"],
    "not an array"
];

$iter = new RecursiveDirectoryIterator('../../');
$recIter = new RecursiveIteratorIterator($iter);

foreach ($recIter as $key => $value) {
    echo $key . ": " . $value . "<br>";
}
