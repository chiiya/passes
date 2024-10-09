<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Chiiya\Passes\Common\Component;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

class Localization extends Component
{
    public function __construct(
        /**
         * Required.
         * Localization language key (`en`, `es`, ...).
         */
        #[NotBlank]
        public string $language,
        /**
         * Array of string translations.
         *
         * @var string[]
         */
        public array $strings = [],
        /**
         * Array of localized images.
         *
         * @var Image[]
         */
        #[All([new Type(Image::class)])]
        public array $images = [],
    ) {
        parent::__construct();
    }

    public function addString(string $key, string $value): static
    {
        $this->strings[$key] = $value;

        return $this;
    }
}
