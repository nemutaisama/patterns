<?php
$stack = new SplStack();

// добавляем элемент в стек
$stack->push('1');
$stack->push('2');
$stack->push('3');

echo $stack->count(); // 3
echo "<br>";
echo $stack->top(); // 3
echo "<br>";
echo $stack->bottom(); // 1
echo "<br>";
echo $stack->serialize(); //i:6;:s:1:"1";:s:1:"2";:s:1:"3";
echo "<br>";

// извлекаем элементы из стека
echo $stack->pop(); // 3
echo "<br>";
echo $stack->pop(); // 2
echo "<br>";
echo $stack->pop(); // 1
echo "<br>";
