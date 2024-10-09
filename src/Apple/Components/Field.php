<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Chiiya\Passes\Apple\Enumerators\DataDetector;
use Chiiya\Passes\Apple\Enumerators\DateStyle;
use Chiiya\Passes\Apple\Enumerators\NumberStyle;
use Chiiya\Passes\Common\Component;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class Field extends Component
{
    public function __construct(
        /**
         * Required.
         * The key must be unique within the scope of the entire pass.
         */
        #[NotBlank]
        public string $key,
        /**
         * Required.
         * Value of the field.
         */
        #[NotBlank]
        public float|int|string $value,
        /**
         * Optional.
         * Label text for the field.
         */
        public ?string $label = null,
        /**
         * Optional.
         * Attributed value of the field.
         * The value may contain HTML markup for links. Only the <a> tag and its href attribute are supported.
         * This key's value overrides the text specified by the value key.
         */
        public ?string $attributedValue = null,
        /**
         * Optional.
         * Format string for the alert text that is displayed when the pass is updated.
         * The format string must contain the escape %@, which is replaced with the field’s new value.
         * For example, “Gate changed to %@.”.
         */
        #[Regex('/%@/')]
        public ?string $changeMessage = null,
        /**
         * Optional.
         * Data detectors that are applied to the field’s value. All detectors are applied by default.
         * Provide an empty array to use no data detectors.
         */
        #[All([
            new Choice([
                DataDetector::PHONE_NUMBER,
                DataDetector::LINK,
                DataDetector::ADDRESS,
                DataDetector::CALENDAR_EVENT,
            ]),
        ])]
        public ?array $dataDetectorTypes = null,
        /**
         * Optional.
         * Style of date to display. MUST be used in conjunction with $timeStyle.
         */
        #[Choice([DateStyle::NONE, DateStyle::SHORT, DateStyle::MEDIUM, DateStyle::LONG, DateStyle::FULL])]
        public ?string $dateStyle = null,
        /**
         * Optional.
         * Always display the time and date in the given time zone, not in the user’s current time zone.
         * Defaults to false.
         */
        public ?bool $ignoresTimeZone = null,
        /**
         * Optional.
         * If true, the label's value is displayed as a relative date; otherwise, it is displayed as an absolute date.
         * Defaults to false.
         */
        public ?bool $isRelative = null,
        /**
         * Optional.
         * Style of time to display. MUST be used in conjunction with $dateStyle.
         */
        #[Choice([DateStyle::NONE, DateStyle::SHORT, DateStyle::MEDIUM, DateStyle::LONG, DateStyle::FULL])]
        public ?string $timeStyle = null,
        /**
         * Optional.
         * ISO 4217 currency code for the field’s value.
         */
        public ?string $currencyCode = null,
        /**
         * Optional.
         * Style of number to display. Only allowed for numeric field values.
         */
        #[Choice([NumberStyle::DECIMAL, NumberStyle::PERCENT, NumberStyle::SCIENTIFIC, NumberStyle::SPELL_OUT])]
        public ?string $numberStyle = null,
    ) {
        parent::__construct();
    }
}
