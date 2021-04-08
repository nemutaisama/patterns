<?php

use Patterns\ORM\ServiceRegistry;

require_once '../vendor/autoload.php';

//load config
$config = [
    'db' => 'mysql',
];

//configure services
ServiceRegistry::getInstance()->configure($config);

//use router to render page
echo (new \Patterns\ORM\ORMController())->render();
