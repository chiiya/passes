<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Http;

use Chiiya\Passes\Google\ServiceCredentials;
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
    private static ?CacheItemPoolInterface $cache = null;

    /** @var string */
    final public const BASE_URI = 'https://walletobjects.googleapis.com/';

    /** @var string */
    final public const SCOPE = 'https://www.googleapis.com/auth/wallet_object.issuer';

    /**
     * Get credentials cache instance. Defaults to memory cache.
     */
    public static function getCache(): CacheItemPoolInterface
    {
        if (self::$cache === null) {
            self::$cache = new MemoryCacheItemPool;
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
    public static function createAuthTokenMiddleware(ServiceCredentials $credentials): AuthTokenMiddleware
    {
        $fetcher = new FetchAuthTokenCache(
            self::createApplicationDefaultCredentials($credentials),
            [],
            self::getCache(),
        );

        if (($client = HttpClientCache::getHttpClient()) === null) {
            $client = new Client([
                'base_uri' => self::BASE_URI,
            ]);
            HttpClientCache::setHttpClient($client);
        }

        $httpHandler = HttpHandlerFactory::build($client);

        return new AuthTokenMiddleware($fetcher, $httpHandler);
    }

    /**
     * Create service account credentials from config.
     */
    protected static function createApplicationDefaultCredentials(
        ServiceCredentials $credentials,
    ): ServiceAccountCredentials {
        return new ServiceAccountCredentials([self::SCOPE], array_merge($credentials->toArray(), [
            'type' => 'service_account',
        ]));
    }
}
