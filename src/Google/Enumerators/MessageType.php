<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class MessageType implements LegacyValueEnumerator
{
    /** @var string */
    public const MESSAGE_TYPE_UNSPECIFIED = 'MESSAGE_TYPE_UNSPECIFIED';

    /** @var string */
    public const TEXT = 'TEXT';

    /** @var string */
    public const EXPIRATION_NOTIFICATION = 'EXPIRATION_NOTIFICATION';

    public static function values(): array
    {
        return [self::MESSAGE_TYPE_UNSPECIFIED, self::TEXT, self::EXPIRATION_NOTIFICATION];
    }

    public function mapLegacyValues(string $value): string
    {
        return str_replace([
            'text',
            'expirationNotification',
        ], [self::TEXT, self::EXPIRATION_NOTIFICATION], $value);
    }
}
