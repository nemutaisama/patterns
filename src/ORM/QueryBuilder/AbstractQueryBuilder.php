<?php

namespace Patterns\ORM\QueryBuilder;

use Patterns\ORM\DBConnect\AbstractDBConnect;

abstract class AbstractQueryBuilder
{
    private AbstractDBConnect $dbConnect;

    public function __construct(
        AbstractDBConnect $DBConnect
    )
    {
        $this->dbConnect = $DBConnect;
    }
    protected string $query = '';

    abstract public function select(string $fields): self;
    abstract public function from(string $tableName): self;
    abstract public function limit(int $limit, int $offset): self;
    abstract public function where(string $field, $value): self;

    public function runQuery() : string
    {
        return $this->dbConnect->execute($this->query);
    }
}
