<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Chiiya\Passes\Common\Validation\Required;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\Strict;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

#[Strict]
class Localization extends DataTransferObject
{
    /** Localization language key (`en`, `es`, ...). */
    #[Required]
    public ?string $language;

    /**
     * Array of string translations.
     *
     * @var string[]
     */
    public array $strings = [];

    /**
     * Array of localized images.
     *
     * @var Image[]
     */
    #[CastWith(ArrayCaster::class, Image::class)]
    public array $images = [];

    public function addString(string $key, string $value): self
    {
        $this->strings[$key] = $value;

        return $this;
    }
}
