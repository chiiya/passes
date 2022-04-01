<?php declare(strict_types=1);

namespace Chiiya\Passes\Common\Validation;

use Attribute;
use Spatie\DataTransferObject\Validation\ValidationResult;
use Spatie\DataTransferObject\Validator;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
class RgbColor implements Validator
{
    public function validate(mixed $value): ValidationResult
    {
        if ($this->isValidRgbColor($value)) {
            return ValidationResult::valid();
        }

        return ValidationResult::invalid('The value is not a valid rgb color definition.');
    }

    private function isValidRgbColor(mixed $value): bool
    {
        if ($value === null) {
            return true;
        }

        $value = str_replace(' ', '', $value);

        if (! str_starts_with($value, 'rgb(')) {
            return false;
        }
        $items = explode(',', mb_substr($value, 4, -1));

        if (count($items) !== 3) {
            return false;
        }

        foreach ($items as $item) {
            if ((int) $item < 0 || (int) $item > 255) {
                return false;
            }
        }

        return true;
    }
}
