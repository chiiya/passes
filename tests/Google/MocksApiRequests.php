<?php

namespace Chiiya\Passes\Tests\Google;

use Chiiya\Passes\Google\Http\GoogleClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;

trait MocksApiRequests
{
    protected array $transactions = [];

    protected function createMockClient(string $path): GoogleClient
    {
        $body = file_get_contents(__DIR__.'/Fixtures/responses/'.$path.'.json');
        $mock = new MockHandler([new Response(200, [], $body)]);
        $handler = HandlerStack::create($mock);
        $handler->push(Middleware::history($this->transactions));

        return new GoogleClient(new Client([
            'handler' => $handler,
        ]));
    }
}
