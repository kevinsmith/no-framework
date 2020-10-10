<?php
declare(strict_types=1);

namespace ExampleApp;

use Psr\Http\Message\ResponseInterface;

/**
 *
 *
 * @package   ExampleApp
 */
class MainPage
{
    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * HelloWorld constructor.
     *
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response) {
        $this->response = $response;
    }

    /**
     *
     *
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public function __invoke(): ResponseInterface
    {
        $response = $this->response->withHeader('Content-Type', 'text/html');
        $response->getBody()
            ->write('<html><head></head><body>Go to the <a href="/hello">Hello, World!</a> example.</body></html>');

        return $response;
    }
}
