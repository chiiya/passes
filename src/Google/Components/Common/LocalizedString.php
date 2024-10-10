<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Passes\Common\Component;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Type;

class LocalizedString extends Component
{
    public function __construct(
        /**
         * Required.
         * Contains the string to be displayed if no appropriate translation is available.
         */
        public TranslatedString $defaultValue,
        /**
         * Optional.
         * Contains the translations for the string.
         *
         * @var TranslatedString[]
         */
        #[All([new Type(TranslatedString::class)])]
        #[Cast(ArrayCaster::class, TranslatedString::class)]
        public array $translatedValues = [],
    ) {
        parent::__construct();
    }

    /**
     * Helper method for creating new localized string:
     * LocalizedString::make('en', 'Some value').
     */
    public static function make(string $language, string $value): static
    {
        return new static(defaultValue: new TranslatedString(language: $language, value: $value));
    }

    public static function create(array $values): static
    {
        return new self(...$values);
    }
}
