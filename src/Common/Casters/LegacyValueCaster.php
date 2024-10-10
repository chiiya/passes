<?php declare(strict_types=1);

namespace Chiiya\Passes\Common\Casters;

use Antwerpes\DataTransferObject\CastsProperty;
use Chiiya\Passes\Common\LegacyValueEnumerator;
use LogicException;

readonly class LegacyValueCaster implements CastsProperty
{
    public function __construct(
        private array $types,
        /** @var class-string<LegacyValueEnumerator> */
        private string $enum,
    ) {}

    public function unserialize(mixed $value): ?string
    {
        if (! in_array('string', $this->types, true)) {
            throw new LogicException('Caster [LegacyValueCaster] may only be used to cast strings.');
        }

        if ($value === null) {
            return null;
        }

        return $this->enum::mapLegacyValues($value);
    }

    public function serialize(mixed $value): ?string
    {
        if (! in_array('string', $this->types, true)) {
            throw new LogicException('Caster [LegacyValueCaster] may only be used to cast strings.');
        }

        if ($value === null) {
            return null;
        }

        return $this->enum::mapLegacyValues($value);
    }
}
