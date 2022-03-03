<?php

namespace Chiiya\Passes\Google\Http;

use Exception;
use Google\Auth\Cache\MemoryCacheItemPool;
use Google\Auth\Credentials\ServiceAccountCredentials;
use Google\Auth\FetchAuthTokenCache;
use Google\Auth\HttpHandler\HttpClientCache;
use Google\Auth\HttpHandler\HttpHandlerFactory;
use Google\Auth\Middleware\AuthTokenMiddleware;
use GuzzleHttp\Client;
use Psr\Cache\CacheItemPoolInterface;

class GoogleAuthMiddleware
{
    public const BASE_URI = 'https://walletobjects.googleapis.com/';

    public const SCOPE = 'https://www.googleapis.com/auth/wallet_object.issuer';

    private static ?CacheItemPoolInterface $cache;

    /**
     * Get credentials cache instance. Defaults to memory cache.
     */
    public static function getCache(): CacheItemPoolInterface
    {
        if (! self::$cache) {
            self::$cache = new MemoryCacheItemPool();
        }

        return self::$cache;
    }

    /**
     * Set credentials cache instance.
     */
    public static function setCache(CacheItemPoolInterface $cache): void
    {
        self::$cache = $cache;
    }

    /**
     * Obtain an AuthTokenMiddleware for fetching auth credentials.
     *
     * @throws Exception
     */
    public static function createAuthTokenMiddleware(array $config): AuthTokenMiddleware
    {
        $credentials = new FetchAuthTokenCache(
            self::createApplicationDefaultCredentials($config),
            [],
            self::$cache,
        );

        if (! ($client = HttpClientCache::getHttpClient())) {
            $client = new Client([
                'base_uri' => self::BASE_URI,
            ]);
            HttpClientCache::setHttpClient($client);
        }

        $httpHandler = HttpHandlerFactory::build($client);

        return new AuthTokenMiddleware($credentials, $httpHandler);
    }

    /**
     * Create service account credentials from config.
     */
    protected static function createApplicationDefaultCredentials(array $config): ServiceAccountCredentials
    {
        return new ServiceAccountCredentials([self::SCOPE], [
            'client_id' => $config['client_id'],
            'client_email' => $config['client_email'],
            'private_key' => $config['private_key'],
            'type' => 'service_account',
        ]);
    }
}
