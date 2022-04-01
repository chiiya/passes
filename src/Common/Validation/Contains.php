<?php declare(strict_types=1);

namespace Chiiya\Passes\Common\Validation;

use Attribute;
use Spatie\DataTransferObject\Validation\ValidationResult;
use Spatie\DataTransferObject\Validator;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
class Contains implements Validator
{
    public function __construct(
        private string $needle,
    ) {}

    public function validate(mixed $value): ValidationResult
    {
        if ($value === null || str_contains($value, $this->needle)) {
            return ValidationResult::valid();
        }

        return ValidationResult::invalid("The value must contain {$this->needle}.");
    }
}
