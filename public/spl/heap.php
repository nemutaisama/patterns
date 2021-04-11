<?php

echo "SplMaxHeap <br>";
$heap = new SplMaxHeap();

$heap->insert('111');
$heap->insert('777');
$heap->insert('666');

echo $heap->extract(); // 777
echo "<br>";
echo $heap->extract(); // 666
echo "<br>";
echo $heap->extract(); // 111
echo "<br>";

echo "SplMinHeap <br>";
$heap = new SplMinHeap();
$heap->insert('111');
$heap->insert('777');
$heap->insert('666');

echo $heap->extract(); // 111
echo "<br>";
echo $heap->extract(); // 666
echo "<br>";
echo $heap->extract(); // 777
echo "<br>";
