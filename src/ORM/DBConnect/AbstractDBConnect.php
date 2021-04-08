<?php

namespace Patterns\ORM\DBConnect;

abstract class AbstractDBConnect
{
    abstract public function execute(string $sql);
}
