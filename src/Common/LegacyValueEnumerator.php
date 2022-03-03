<?php

namespace Chiiya\Passes\Common;

interface LegacyValueEnumerator
{
    public function mapLegacyValues(string $value): string;
}
