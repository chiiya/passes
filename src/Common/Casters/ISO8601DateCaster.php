<?php declare(strict_types=1);

namespace Chiiya\Passes\Common\Casters;

use DateTimeInterface;
use Spatie\DataTransferObject\Caster;

class ISO8601DateCaster implements Caster
{
    public function cast(mixed $value): string
    {
        if ($value instanceof DateTimeInterface) {
            return $value->format(DateTimeInterface::ATOM);
        }

        return (string) $value;
    }
}
