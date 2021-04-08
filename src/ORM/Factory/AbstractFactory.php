<?php

namespace Patterns\ORM\Factory;

use Patterns\ORM\DBConnect\AbstractDBConnect;
use Patterns\ORM\QueryBuilder\AbstractQueryBuilder;

abstract class AbstractFactory
{
    abstract public function getDBConnect(): AbstractDBConnect;

    abstract public function getQueryBuilder(): AbstractQueryBuilder;
}
