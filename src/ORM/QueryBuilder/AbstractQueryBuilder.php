<?php

namespace Patterns\ORM\QueryBuilder;

use Patterns\ORM\ServiceRegistry;

abstract class AbstractQueryBuilder
{
    protected string $query = '';

    abstract public function select(string $fields): self;
    abstract public function from(string $tableName): self;
    abstract public function limit(int $limit, int $offset): self;
    abstract public function where(string $field, $value): self;

    public function runQuery() : string
    {
        $connect = ServiceRegistry::getInstance()->getDBConnect();
        return $connect->execute($this->query);
    }
}
