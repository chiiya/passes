<?php declare(strict_types=1);

namespace Chiiya\Passes\Common\Casters;

use DateTimeInterface;
use Spatie\DataTransferObject\Caster;

class W3CDateCaster implements Caster
{
    public function cast(mixed $value): string
    {
        if ($value instanceof DateTimeInterface) {
            return $value->format(DateTimeInterface::W3C);
        }

        return (string) $value;
    }
}
