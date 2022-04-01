<?php declare(strict_types=1);

namespace Chiiya\Passes\Common\Validation;

use Attribute;
use Spatie\DataTransferObject\Validation\ValidationResult;
use Spatie\DataTransferObject\Validator;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
class NumberBetween implements Validator
{
    public function __construct(
        private int $min,
        private int $max,
    ) {}

    public function validate(mixed $value): ValidationResult
    {
        if ($value === null) {
            return ValidationResult::valid();
        }

        if ($value < $this->min) {
            return ValidationResult::invalid("Value should be greater than or equal to {$this->min}.");
        }

        if ($value > $this->max) {
            return ValidationResult::invalid("Value should be less than or equal to {$this->max}.");
        }

        return ValidationResult::valid();
    }
}
