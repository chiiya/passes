<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Chiiya\Passes\Apple\Enumerators\DataDetector;
use Chiiya\Passes\Apple\Enumerators\DateStyle;
use Chiiya\Passes\Apple\Enumerators\NumberStyle;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Contains;
use Chiiya\Passes\Common\Validation\Required;
use Chiiya\Passes\Common\Validation\ValueIn;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class Field extends Component
{
    /**
     * Optional.
     * Attributed value of the field.
     * The value may contain HTML markup for links. Only the <a> tag and its href attribute are supported.
     * This key's value overrides the text specified by the value key.
     */
    public ?string $attributedValue;

    /**
     * Optional.
     * Format string for the alert text that is displayed when the pass is updated.
     * The format string must contain the escape %@, which is replaced with the field’s new value.
     * For example, “Gate changed to %@.”.
     */
    #[Contains('%@')]
    public ?string $changeMessage;

    /**
     * Optional.
     * Data detectors that are applied to the field’s value. All detectors are applied by default.
     * Provide an empty array to use no data detectors.
     */
    #[ValueIn([DataDetector::PHONE_NUMBER, DataDetector::LINK, DataDetector::ADDRESS, DataDetector::CALENDAR_EVENT])]
    public ?array $dataDetectorTypes;

    /**
     * Required.
     * The key must be unique within the scope of the entire pass.
     */
    #[Required]
    public ?string $key;

    /**
     * Optional.
     * Label text for the field.
     */
    public ?string $label;

    /**
     * Required.
     * Value of the field.
     */
    #[Required]
    public int|float|string|null $value;

    /**
     * Optional.
     * Style of date to display. MUST be used in conjunction with $timeStyle.
     */
    #[ValueIn([DateStyle::NONE, DateStyle::SHORT, DateStyle::MEDIUM, DateStyle::LONG, DateStyle::FULL])]
    public ?string $dateStyle;

    /**
     * Optional.
     * Always display the time and date in the given time zone, not in the user’s current time zone.
     * Defaults to false.
     */
    public ?bool $ignoresTimeZone;

    /**
     * Optional.
     * If true, the label's value is displayed as a relative date; otherwise, it is displayed as an absolute date.
     * Defaults to false.
     */
    public ?bool $isRelative;

    /**
     * Optional.
     * Style of time to display. MUST be used in conjunction with $dateStyle.
     */
    #[ValueIn([DateStyle::NONE, DateStyle::SHORT, DateStyle::MEDIUM, DateStyle::LONG, DateStyle::FULL])]
    public ?string $timeStyle;

    /**
     * Optional.
     * ISO 4217 currency code for the field’s value.
     */
    public ?string $currencyCode;

    /**
     * Optional.
     * Style of number to display. Only allowed for numeric field values.
     */
    #[ValueIn([NumberStyle::DECIMAL, NumberStyle::PERCENT, NumberStyle::SCIENTIFIC, NumberStyle::SPELL_OUT])]
    public ?string $numberStyle;
}
