<?php declare(strict_types=1);

namespace Chiiya\Passes\Common\Validation;

use Attribute;
use Spatie\DataTransferObject\Validation\ValidationResult;
use Spatie\DataTransferObject\Validator;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
class HexColor implements Validator
{
    public function validate(mixed $value): ValidationResult
    {
        if ($this->isValidHexColor($value)) {
            return ValidationResult::valid();
        }

        return ValidationResult::invalid('The value is not a valid hex color definition.');
    }

    private function isValidHexColor(mixed $value): bool
    {
        if ($value === null) {
            return true;
        }

        return (bool) preg_match('/^#([0-9a-fA-F]{3}){1,2}$/', $value);
    }
}
