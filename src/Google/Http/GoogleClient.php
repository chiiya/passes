<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Http;

use Chiiya\Passes\Google\ServiceCredentials;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use JsonSerializable;

class GoogleClient implements ClientInterface
{
    public function __construct(
        protected Client $client,
    ) {}

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

    public function get(string $url): array
    {
        return $this->execute('GET', $url);
    }

    public function post(string $url, JsonSerializable $data): array
    {
        return $this->execute('POST', $url, json_encode($data));
    }

    public function put(string $url, JsonSerializable $data): array
    {
        return $this->execute('PUT', $url, json_encode($data));
    }

    public function execute(string $method, string $url, ?string $body = null): array
    {
        $request = new Request($method, $url, $this->commonHeaders(), $body);
        $response = $this->client->send($request);

        return json_decode($response->getBody()->getContents(), true);
    }

    protected function commonHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }
}
