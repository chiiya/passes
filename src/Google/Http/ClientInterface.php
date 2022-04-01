<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Http;

use JsonSerializable;

interface ClientInterface
{
    public function get(string $url): array;

    public function post(string $url, JsonSerializable $data): array;

    public function put(string $url, JsonSerializable $data): array;
}
