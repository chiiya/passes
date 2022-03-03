<?php

namespace Chiiya\Passes\Google\Http;

interface ClientInterface
{
    public function execute(string $method, string $url, ?string $body = null): array;

    public function setConfig(array $config): static;
}
