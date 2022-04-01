<?php declare(strict_types=1);

namespace Chiiya\Passes\Common\Validation;

use Attribute;
use Spatie\DataTransferObject\Validation\ValidationResult;
use Spatie\DataTransferObject\Validator;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
class Required implements Validator
{
    public function validate(mixed $value): ValidationResult
    {
        if ($value === null) {
            return ValidationResult::invalid('The field is required.');
        }

        if (is_string($value) && trim($value) === '') {
            return ValidationResult::invalid('The field is required.');
        }

        if (is_array($value) && count($value) < 1) {
            return ValidationResult::invalid('The field is required.');
        }

        return ValidationResult::valid();
    }
}
