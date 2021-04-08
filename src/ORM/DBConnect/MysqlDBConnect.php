<?php

namespace Patterns\ORM\DBConnect;

class MysqlDBConnect extends AbstractDBConnect
{

    public function execute(string $sql)
    {
        return "Выполнили запрос {$sql} на БД MySQL";
    }
}
