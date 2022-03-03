<?php

namespace Chiiya\Passes\Google;

class JWTBuilder
{
    public function __construct(
        protected ServiceCredentials $credentials,
    ) {
    }

    /**
     * Create a signed JWT.
     */
    public function createSignedJWT(array $origins = [], array $payload = []): JWT
    {
        return new JWT([
            'iss' => $this->credentials->client_email,
            'key' => $this->credentials->private_key,
            'origins' => $origins,
            'payload' => $payload,
        ]);
    }
}
