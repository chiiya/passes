<?php

namespace Chiiya\Passes\Google\Http;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;

class GoogleClient implements ClientInterface
{
    public function __construct(
        protected ?Client $client = null,
        protected array $config = [],
    ) {
    }

    public function execute(string $method, string $url, ?string $body = null): array
    {
        $request = new Request($method, $url, $this->commonHeaders(), $body);
        $response = $this->getClient()->send($request);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Set the service-credentials config.
     */
    public function setConfig(array $config): static
    {
        $this->config = $config;

        return $this;
    }

    public function getClient(): Client
    {
        if (! $this->client) {
            $stack = HandlerStack::create();
            $stack->push(GoogleAuthMiddleware::createAuthTokenMiddleware($this->config));
            $this->client = new Client([
                'handler' => $stack,
                'auth' => 'google_auth',
            ]);
        }

        return $this->client;
    }

    protected function commonHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }
}
