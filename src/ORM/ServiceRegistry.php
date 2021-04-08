<?php

namespace Patterns\ORM;

use Patterns\ORM\DBConnect\AbstractDBConnect;
use Patterns\ORM\Factory\AbstractFactory;
use Patterns\ORM\Factory\MysqlFactory;
use Patterns\ORM\Factory\PostgresFactory;
use Patterns\ORM\QueryBuilder\AbstractQueryBuilder;

class ServiceRegistry
{
    private static $instance;

    private AbstractFactory $factory;


    public static function getInstance(): self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function configure(array $config)
    {
        $this->factory = $this->createDBFactory($config['db']);
    }


    public function getQueryBuilder(): AbstractQueryBuilder
    {
        return $this->factory->getQueryBuilder();
    }

    public function getDBConnect(): AbstractDBConnect
    {
        return $this->factory->getDBConnect();
    }


    private function createDBFactory(string $usedDB): AbstractFactory
    {
        switch ($usedDB) {
            case 'mysql':
                return new MysqlFactory();
            case 'postgres':
                return new PostgresFactory();
        }
    }

    private function __construct() {}
}
