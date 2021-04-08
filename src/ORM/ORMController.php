<?php

namespace Patterns\ORM;

class ORMController
{

    public function render()
    {
        $queryBuilder = ServiceRegistry::getInstance()->getQueryBuilder();
        $queryBuilder
            ->select('test, field')
            ->from('sometable')
            ->where('field2', '234')
            ->limit(10, 0)
        ;


        echo $queryBuilder->runQuery();
    }
}
