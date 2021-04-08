<?php

namespace Patterns\ORM\Factory;

use Patterns\ORM\DBConnect\AbstractDBConnect;
use Patterns\ORM\DBConnect\PostresDBConnect;
use Patterns\ORM\QueryBuilder\AbstractQueryBuilder;
use Patterns\ORM\QueryBuilder\PostresQueryBuilder;

class PostgresFactory extends AbstractFactory
{

    public function getDBConnect(): AbstractDBConnect
    {
        return new PostresDBConnect();
    }


    public function getQueryBuilder(): AbstractQueryBuilder
    {
        return new PostresQueryBuilder();
    }
}
