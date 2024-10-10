<?php declare(strict_types=1);

namespace Chiiya\Passes\Common;

interface LegacyValueEnumerator
{
    public static function mapLegacyValues(string $value): string;
}
