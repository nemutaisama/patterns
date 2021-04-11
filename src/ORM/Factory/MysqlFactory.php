<?php

namespace Patterns\ORM\Factory;

use Patterns\ORM\DBConnect\AbstractDBConnect;
use Patterns\ORM\DBConnect\MysqlDBConnect;
use Patterns\ORM\QueryBuilder\AbstractQueryBuilder;
use Patterns\ORM\QueryBuilder\MysqlQueryBuilder;

class MysqlFactory extends AbstractFactory
{

    public function getDBConnect(): AbstractDBConnect
    {
        return new MysqlDBConnect();
    }


    public function getQueryBuilder(): AbstractQueryBuilder
    {
        return new MysqlQueryBuilder($this->getDBConnect());
    }
}
