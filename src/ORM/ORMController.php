<?php

namespace Patterns\ORM;

use Patterns\ORM\QueryBuilder\AbstractQueryBuilder;

class ORMController
{
    private AbstractQueryBuilder $qb;

    public function __construct(
        AbstractQueryBuilder $queryBuilder
    ) {
        $this->qb = $queryBuilder;
    }

    public function render()
    {
        $this->qb
            ->select('test, field')
            ->from('sometable')
            ->where('field2', '234')
            ->limit(10, 0)
        ;


        echo $this->qb->runQuery();
    }
}
