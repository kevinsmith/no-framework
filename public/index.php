<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use ExampleApp\HelloWorld;
use function DI\create;

require_once __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->useAutowiring(false);
$containerBuilder->useAnnotations(false);
$containerBuilder->addDefinitions([
    HelloWorld::class => create(HelloWorld::class)
]);

/** @noinspection PhpUnhandledExceptionInspection */
$container = $containerBuilder->build();

$helloWorld = $container->get(HelloWorld::class);
$helloWorld->announce();
