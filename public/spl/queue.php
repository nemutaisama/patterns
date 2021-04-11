<?php

$queue = new SplQueue();

$queue->setIteratorMode(SplQueue::IT_MODE_DELETE);

$queue->enqueue('one');
$queue->enqueue('two');
$queue->enqueue('qwerty');

//$queue->dequeue();
//$queue->dequeue();

echo $queue->top(); // qwerty
echo $queue->top(); // qwerty
