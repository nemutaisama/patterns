<?php

$queue = new SplPriorityQueue();
$queue->setExtractFlags(SplPriorityQueue::EXTR_DATA); // получаем только значения элементов

$queue->insert('пятый', 1);
$queue->insert('третий', 1);
$queue->insert('первый', 1);
$queue->insert('четвертый', 1);
$queue->insert('шестой', 1);
$queue->insert('второй', 1);

$queue->rewind();
while($queue->valid())
{
    echo $queue->current() . "<br>";
    $queue->next();
}
//YTREWQ
