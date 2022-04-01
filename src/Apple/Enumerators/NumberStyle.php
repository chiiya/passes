<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Enumerators;

final class NumberStyle
{
    /** @var string */
    public const DECIMAL = 'PKNumberStyleDecimal';

    /** @var string */
    public const PERCENT = 'PKNumberStylePercent';

    /** @var string */
    public const SCIENTIFIC = 'PKNumberStyleScientific';

    /** @var string */
    public const SPELL_OUT = 'PKNumberStyleSpellOut';
}
