<?php

namespace Patterns\ORM\QueryBuilder;

class MysqlQueryBuilder extends AbstractQueryBuilder
{

    public function select(string $fields): AbstractQueryBuilder
    {
        $this->query .= "MYSQL SELECT {$fields} ";
        return $this;
    }


    public function from(string $tableName): AbstractQueryBuilder
    {
        $this->query .= "FROM MYSQL TABLE {$tableName} ";
        return $this;
    }


    public function limit(int $limit, int $offset): AbstractQueryBuilder
    {
        $this->query .= "LIMIT ({$limit}, {$offset}) ";
        return $this;
    }


    public function where(string $field, $value): AbstractQueryBuilder
    {
        $this->query .= "WHERE {$field} = {$value} ";
        return $this;
    }
}
