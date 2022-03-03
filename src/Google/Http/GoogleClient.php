<?php

namespace Chiiya\Passes\Google\Http;

use Chiiya\Passes\Google\ServiceCredentials;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;

class GoogleClient implements ClientInterface
{
    public function __construct(
        protected Client $client,
    ) {
    }

    public function get(string $url): array
    {
        return $this->execute('GET', $url);
    }

    public function post(string $url, string $body): array
    {
        return $this->execute('POST', $url, $body);
    }

    public function put(string $url, string $body): array
    {
        return $this->execute('PUT', $url, $body);
    }

    public function execute(string $method, string $url, ?string $body = null): array
    {
        $request = new Request($method, $url, $this->commonHeaders(), $body);
        $response = $this->client->send($request);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Create an authenticated Google client.
     */
    public static function createAuthenticatedClient(ServiceCredentials $credentials): static
    {
        $stack = HandlerStack::create();
        $stack->push(GoogleAuthMiddleware::createAuthTokenMiddleware($credentials));
        $client = new Client([
            'handler' => $stack,
            'auth' => 'google_auth',
        ]);

        return new static($client);
    }

    protected function commonHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }
}
