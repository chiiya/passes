<?php declare(strict_types=1);

namespace Chiiya\Passes\Common\Casters;

interface Caster
{
    public static function cast(mixed $value): mixed;
}
