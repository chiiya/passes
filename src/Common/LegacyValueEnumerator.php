<?php declare(strict_types=1);

namespace Chiiya\Passes\Common;

interface LegacyValueEnumerator
{
    public function mapLegacyValues(string $value): string;
}
