<?php

class NameFilter extends FilterIterator
{
    private $value;

    public function __construct(Iterator $iterator, $value)
    {
        parent::__construct($iterator);
        $this->value = $value;
    }


    public function accept()
    {
        $value = $this->getInnerIterator()->current();
        return strpos($value['name'], $this->value) === 0;
    }
}

class IdFilter extends FilterIterator
{
    private $value;

    public function __construct(Iterator $iterator, $value)
    {
        parent::__construct($iterator);
        $this->value = $value;
    }

    public function accept()
    {
        $value = $this->getInnerIterator()->current();
        return $value['id'] > $this->value;
    }
}

class PriorityQueueIterator extends SplPriorityQueue
{
    public function __construct($array)
    {
        foreach ($array as $val) {
            $this->insert($val, $val['name']);
        }
        $this->rewind();
    }

    public function next()
    {
        parent::next();
        parent::next();
    }


    public function compare($priority1, $priority2)
    {
        if ($priority1 === $priority2) return 0;
        return $priority1 < $priority2 ? 1 : -1;
    }
}


class RandomIterator implements Iterator
{
    private stdClass $data;
    private $fields;
    private ReflectionClass $ref;

    public function __construct(stdClass $array)
    {
        $this->data = $array;
        $this->ref = new ReflectionClass($array);
        $this->fields = $this->ref->getProperties();
        var_dump($this->fields);
    }

    public function current()
    {
        return $this->ref->getProperty(current($this->fields));
    }


    public function next()
    {
        prev($this->fields);
    }


    public function key()
    {
        return $this->fields;
    }


    public function valid()
    {
        return (bool) current($this->fields);
    }


    public function rewind()
    {
        end($this->fields);
    }
}


//$input = [
//    "nameFilter" => 'M',
//    "idFilter" => 5
//];

$arr = [
    ['id' => 7, 'name' => "Moscow"],
    ['id' => 5, 'name' => "Munich"],
    ['id' => 3, 'name' => "Beijing"],
    ['id' => 2, 'name' => "Roma"],
    ['id' => 4, 'name' => "Barcelona"],
    ['id' => 1, 'name' => "London"]
];

$arr = new stdClass();
$arr->test = 1;
$arr->w = 123;
$arr->l23423 = 'wertwert';
$arr->какоетополе = 'sdfgafsdasd';
$arr->wtrwwer = ['qwer', 'qwerwqe'];

$iter = createIterator($arr);
//
//if (isset($input["nameFilter"])) {
//    $iter = new NameFilter($iter, $input["nameFilter"]);
//    $iter->rewind();
//}
//
//if (isset($input["idFilter"])) {
//    $iter = new IdFilter($iter, $input["idFilter"]);
//    $iter->rewind();
//}

while ($iter->valid()) {
    echo $iter->current()['id'] . " => " . $iter->current()['name'] . "<br>";
    $iter->next();
}



function createIterator( $data): Iterator
{
    $iterator = new RandomIterator($data);

    $iterator->rewind();
    return $iterator;

}
