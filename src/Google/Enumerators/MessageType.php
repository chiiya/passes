<?php

namespace Chiiya\Passes\Google\Enumerators;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class MessageType implements LegacyValueEnumerator
{
    public const MESSAGE_TYPE_UNSPECIFIED = 'MESSAGE_TYPE_UNSPECIFIED';

    public const TEXT = 'TEXT';

    public const EXPIRATION_NOTIFICATION = 'EXPIRATION_NOTIFICATION';

    public function mapLegacyValues(string $value): string
    {
        return str_replace([
            'text',
            'expirationNotification',
        ], [self::TEXT, self::EXPIRATION_NOTIFICATION], $value);
    }

    public static function values(): array
    {
        return [self::MESSAGE_TYPE_UNSPECIFIED, self::TEXT, self::EXPIRATION_NOTIFICATION];
    }
}
