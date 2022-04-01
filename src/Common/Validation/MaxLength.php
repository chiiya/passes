<?php declare(strict_types=1);

namespace Chiiya\Passes\Common\Validation;

use Attribute;
use Spatie\DataTransferObject\Validation\ValidationResult;
use Spatie\DataTransferObject\Validator;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
class MaxLength implements Validator
{
    public function __construct(
        private int $size,
    ) {}

    public function validate(mixed $value): ValidationResult
    {
        if ($value === null || (is_string($value) && mb_strlen($value) <= $this->size)) {
            return ValidationResult::valid();
        }

        return ValidationResult::invalid("The value may not be longer than {$this->size} characters.");
    }
}
