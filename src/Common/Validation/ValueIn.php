<?php declare(strict_types=1);

namespace Chiiya\Passes\Common\Validation;

use Attribute;
use Spatie\DataTransferObject\Validation\ValidationResult;
use Spatie\DataTransferObject\Validator;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
class ValueIn implements Validator
{
    public function __construct(
        private array $values,
    ) {}

    public function validate(mixed $value): ValidationResult
    {
        if ($value === null) {
            return ValidationResult::valid();
        }

        if (is_array($value)) {
            return count(array_diff($value, $this->values)) === 0
                ? ValidationResult::valid()
                : ValidationResult::invalid($this->errorMessage());
        }

        return in_array($value, $this->values, true)
            ? ValidationResult::valid()
            : ValidationResult::invalid($this->errorMessage());
    }

    private function errorMessage(): string
    {
        return 'The value is invalid. Should be one of .'.implode(', ', $this->values);
    }
}
