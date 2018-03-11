<?php
declare(strict_types=1);

namespace ExampleApp;

/**
 *
 *
 * @package   ExampleApp
 */
class HelloWorld
{

    /**
     * @var string
     */
    private $foo;

    public function __construct(string $foo)
    {
        $this->foo = $foo;
    }

    public function __invoke(): void
    {
        echo "Hello, {$this->foo} world!";
        exit;
    }
}
