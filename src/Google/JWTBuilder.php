<?php

namespace Chiiya\Passes\Google;

class JWTBuilder
{
    public function __construct(
        protected ServiceCredentials $credentials,
        protected array $origins = [],
    ) {
    }

    /**
     * Create a new JWT.
     */
    public function create(array $payload = []): JWT
    {
        return new JWT([
            'iss' => $this->credentials->client_email,
            'key' => $this->credentials->private_key,
            'origins' => $this->origins,
            'payload' => $payload,
        ]);
    }
}
