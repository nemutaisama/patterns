<?php

require_once '../../vendor/autoload.php';

class DependencyContainer
{
    private $links = [
        \Patterns\ORM\Factory\AbstractFactory::class => \Patterns\ORM\Factory\PostgresFactory::class
    ];

    private $factories = [
        \Patterns\ORM\QueryBuilder\AbstractQueryBuilder::class => [
            'class' => \Patterns\ORM\Factory\AbstractFactory::class,
            'method' => 'getQueryBuilder'
        ],
        \Patterns\ORM\DBConnect\AbstractDBConnect::class => [
            'class' => \Patterns\ORM\Factory\AbstractFactory::class,
            'method' => 'getDBConnect'
        ],
    ];

    private $services = [];

    public function createComponent($name)
    {
        if (key_exists($name, $this->factories)) {
            $factory = $this->createComponent($this->factories[$name]['class']);
            $method = $this->factories[$name]['method'];
            return $factory->$method();
        }
        if (key_exists($name, $this->links)) {
            $class = $this->links[$name];
        } else {
            $class = $name;
        }
        if (class_exists($class)) {
            $reflection = new \ReflectionClass($class);
            $constructor = $reflection->getConstructor();
            $requiredParams = [];
            if ($constructor) {
                foreach($constructor->getParameters() as $param) {
                    $dependencyName = $param->getClass()->getName();
                    $dependency = $this->createComponent($dependencyName);
                    $requiredParams[] = $dependency;
                }
            }
            return $reflection->newInstanceArgs($requiredParams);
        }
    }
}

$dc = new DependencyContainer();

$controller = $dc->createComponent(\Patterns\ORM\ORMController::class);

echo $controller->render();
