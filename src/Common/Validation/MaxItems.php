<?php declare(strict_types=1);

namespace Chiiya\Passes\Common\Validation;

use Attribute;
use Spatie\DataTransferObject\Validation\ValidationResult;
use Spatie\DataTransferObject\Validator;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
class MaxItems implements Validator
{
    public function __construct(
        private int $size,
    ) {}

    public function validate(mixed $value): ValidationResult
    {
        if ($value === null || (is_array($value) && count($value) <= $this->size)) {
            return ValidationResult::valid();
        }

        return ValidationResult::invalid("The value may not have more than {$this->size} items.");
    }
}
