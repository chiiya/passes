<?php

namespace Chiiya\Passes\Google\Repositories;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Http\ClientInterface;
use Chiiya\Passes\Google\Passes\BaseClass;
use Chiiya\Passes\Google\Passes\BaseObject;

abstract class BaseRepository
{
    public const BASE_URL = 'https://walletobjects.googleapis.com/walletobjects/v1/';

    /**
     * Get the resource URL identifier.
     */
    abstract protected function getIdentifier(): string;

    /**
     * Get the response class name.
     */
    abstract protected function getResponseClass(): string;

    /**
     * Get the instance class name.
     */
    abstract protected function getInstanceClass(): string;

    public function __construct(
        protected ClientInterface $client
    ) {
    }

    /**
     * Get details for a single instance.
     */
    final public function get(string $id): Component
    {
        /** @var Component $class */
        $class = $this->getInstanceClass();
        $response = $this->client->execute('GET', $this->buildEntityUrl($id));

        return $class::create($response);
    }

    /**
     * Create a new instance of $instance.
     */
    final public function create(Component $instance): Component
    {
        /** @var Component $class */
        $class = $this->getInstanceClass();
        $response = $this->client->execute('POST', $this->buildResourceUrl(), json_encode($instance));

        return $class::create($response);
    }

    /**
     * Update an instance.
     */
    final public function update(BaseClass|BaseObject $instance): Component
    {
        /** @var Component $class */
        $class = $this->getInstanceClass();
        $response = $this->client->execute('PUT', $this->buildEntityUrl($instance->id), json_encode($instance));

        return $class::create($response);
    }

    protected function buildResourceUrl(): string
    {
        return self::BASE_URL.$this->getIdentifier();
    }

    protected function buildEntityUrl(string $id): string
    {
        return self::BASE_URL.$this->getIdentifier().'/'.$id;
    }
}
