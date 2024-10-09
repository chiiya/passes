<?php declare(strict_types=1);

namespace Chiiya\Passes\Common\Casters;

use Antwerpes\DataTransferObject\CastsProperty;
use Chiiya\Passes\Common\LegacyValueEnumerator;

class LegacyValueCaster implements CastsProperty
{
    public function __construct(
        private readonly string $enum,
    ) {}

    public function unserialize(mixed $value): ?string
    {
        if ($value === null) {
            return null;
        }

        /** @var LegacyValueEnumerator $enum */
        $enum = new $this->enum;

        return $enum->mapLegacyValues($value);
    }

    public function serialize(mixed $value): ?string
    {
        if ($value === null) {
            return null;
        }

        /** @var LegacyValueEnumerator $enum */
        $enum = new $this->enum;

        return $enum->mapLegacyValues($value);
    }
}
