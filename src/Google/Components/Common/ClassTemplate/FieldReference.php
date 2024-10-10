<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common\ClassTemplate;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Chiiya\Passes\Common\Casters\LegacyValueCaster;
use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Enumerators\DateFormat;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\NotBlank;

class FieldReference extends Component
{
    public function __construct(
        /**
         * Required.
         * Path to the field being referenced, prefixed with "object" or "class" and separated with dots.
         * For example, it may be the string "object.purchaseDetails.purchasePrice".
         */
        #[NotBlank]
        public string $fieldPath,
        /**
         * Optional.
         * Only valid if the fieldPath references a date field. Chooses how the date field will be
         * formatted and displayed in the UI.
         */
        #[Choice([
            DateFormat::DATE_FORMAT_UNSPECIFIED,
            DateFormat::DATE_ONLY,
            DateFormat::TIME_ONLY,
            DateFormat::DATE_YEAR,
            DateFormat::DATE_TIME,
            DateFormat::DATE_TIME_YEAR,
        ])]
        #[Cast(LegacyValueCaster::class, DateFormat::class)]
        public ?string $dateFormat = null,
    ) {
        parent::__construct();
    }
}
