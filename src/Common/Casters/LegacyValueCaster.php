<?php declare(strict_types=1);

namespace Chiiya\Passes\Common\Casters;

use Chiiya\Passes\Common\LegacyValueEnumerator;
use LogicException;
use Spatie\DataTransferObject\Caster;

class LegacyValueCaster implements Caster
{
    public function __construct(
        private array $types,
        private string $enum,
    ) {}

    public function cast(mixed $value): string
    {
        foreach ($this->types as $type) {
            if ($type === 'string') {
                /** @var LegacyValueEnumerator $enum */
                $enum = new $this->enum;

                return $enum->mapLegacyValues($value);
            }
        }

        throw new LogicException('Caster [LegacyValueCaster] may only be used to cast strings.');
    }
}
