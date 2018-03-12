<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use ExampleApp\HelloWorld;
use FastRoute\RouteCollector;
use Middlewares\FastRoute;
use Middlewares\RequestHandler;
use Relay\Relay;
use Zend\Diactoros\ServerRequestFactory;
use function DI\create;
use function DI\get;
use function FastRoute\simpleDispatcher;

require_once __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->useAutowiring(false);
$containerBuilder->useAnnotations(false);
$containerBuilder->addDefinitions([
    HelloWorld::class => create(HelloWorld::class)
        ->constructor(get('Foo')),
    'Foo' => 'bar'
]);

/** @noinspection PhpUnhandledExceptionInspection */
$container = $containerBuilder->build();

$routes = simpleDispatcher(function (RouteCollector $r) {
    $r->get('/hello', HelloWorld::class);
});

$middlewareQueue[] = new FastRoute($routes);
$middlewareQueue[] = new RequestHandler($container);

/** @noinspection PhpUnhandledExceptionInspection */
$requestHandler = new Relay($middlewareQueue);
$requestHandler->handle(ServerRequestFactory::fromGlobals());
