<?php

namespace Patterns\ORM\DBConnect;

class PostresDBConnect extends AbstractDBConnect
{

    public function execute(string $sql)
    {
        return "Выполнили запрос {$sql} на БД Postgresql";
    }
}
