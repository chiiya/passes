<?php

namespace Chiiya\Passes\Google\Http;

interface ClientInterface
{
    public function get(string $url): array;

    public function post(string $url, string $body): array;

    public function put(string $url, string $body): array;
}
